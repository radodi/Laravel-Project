<?php




  function checkPermission($permissions){

    $userAccess = auth()->user()->role;

    foreach ($permissions as $key => $value) {

      if($value == $userAccess){

        return true;

      }

    }

    return false;

  }


?>

