<?php

if (!defined('MEDIAWIKI')) {
    die();
}

class WikiToLearnACLHooks
{
    public static function deleteProtection(&$title, &$user, $action, &$result)
    {
        global $wgOnlyUserEditUserPage;
        $lTitle = explode('/', $title->getText());

        # If we're not deleting, or we are allowed to do everything, let's just
        # not mind
        if (!($action == 'delete') || $user->isAllowed('wtl_editalluserpages')) {
            return true;
        }

        # If we are an unprivileged user, but we're editing our page, then it's OK...
        if (($title->mNamespace == NS_USER) && ($user->getname() == $lTitle[0])) {
            $result = true;
            return true;
        # In all other cases, prevent deletion
        } else {
            $result = false;
            return false;
        }
    }
}
