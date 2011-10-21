<?php
class EtherpadLiteClient
{

  // INIT
  // Private functions and functions to initialize the object

  private $apikey;
  private $baseurl;
  private $apiversion = 1;

  // Set parameters that will be needed
  function setParams($key, $url = "http://localhost:9001/api", $version = 1)
  {
    $this->baseurl = $url;
    $this->apikey = $key;
    $this->apiversion = $version;
  }

  private function HTTPCall()
  {
    $args = func_num_args();

    // Need a function to call, otherwise just give up
    if($args == 0) {
      return 1;
    }

    $call = $this->baseurl . "/" . $this->apiversion . "/" . func_get_arg(0) . "?apikey=" . $this->apikey;

    // Append arguments to the call
    $arg_list = func_get_args();
    if($args > 1) {
      for($i = 1; $i < $args; $i = $i+2) {
        $call = $call . "&" . func_get_arg($i) . "=" . rawurlencode(func_get_arg($i+1));
      }
    }

    $conn = curl_init($call);
    curl_setopt($conn, CURLOPT_RETURNTRANSFER, True);
    $result = curl_exec($conn);
    curl_close($conn);
    return $result;
  }

  // GROUPS
  // Pads can belong to a group. There will always be public pads that doesnt belong to a group (or we give this group the id 0)

  // Creates a new group
  function createGroup()
  {
    return $this->HTTPCall("createGroup");
  }

  // This functions helps you to map your application group ids to etherpad lite group ids
  function createGroupIfNotExistsFor($groupMapper)
  {
    return $this->HTTPCall("createGroupIfNotExistsFor", "groupMapper", $groupMapper);
  }

  // Deletes a group
  function deleteGroup($groupID)
  {
    return $this->HTTPCall("deleteGroup", "groupID", $groupID);
  }

  // returns all pads of this group
  function listPads($groupID)
  {
    return $this->HTTPCall("listPads", "groupID", $groupID);
  }

  // creates a new pad in this group
  function createGroupPad($groupID, $padName, $text = null)
  {
    if($text) {
      return $this->HTTPCall("createGroupPad", "groupID", $groupID, "padName", $padName, "text", $text);
    } else {
      return $this->HTTPCall("createGroupPad", "groupID", $groupID, "padName", $padName);
    }
  }

  // AUTHORS
  // Theses authors are bind to the attributes the users choose (color and name).

  // creates a new author
  function createAuthor($name)
  {
    if($name) {
      return $this->HTTPCall("createAuthor", "name", $name);
    } else {
      return $this->HTTPCall("createAuthor");
    }
  }

  // this functions helps you to map your application author ids to etherpad lite author ids
  function createAuthorIfNotExistsFor($authorMapper, $name)
  {
    if($name) {
      return $this->HTTPCall("createAuthorIfNotExistsFor", "authorMapper", $authorMapper, "name", $name);
    } else {
      return $this->HTTPCall("createAuthorIfNotExistsFor", "authorMapper", $authorMapper);
    }
  }

  // SESSIONS
  // Sessions can be created between a group and a author. This allows
  // an author to access more than one group. The sessionID will be set as
  // a cookie to the client and is valid until a certian date.

  // creates a new session
  function createSession($groupID, $authorID, $validUntil)
  {
    return $this->HTTPCall("createSession", "groupID", $groupID, "authorID", $authorID, "validUntil", $validUntil);
  }

  // deletes a session
  function deleteSession($sessionID)
  {
    return $this->HTTPCall("deleteSession", "sessionID", $sessionID);
  }

  // returns informations about a session
  function getSessionInfo($sessionID)
  {
    return $this->HTTPCall("getSessionInfo", "sessionID", $sessionID);
  }

  // returns all sessions of a group
  function listSessionsOfGroup($groupID)
  {
    return $this->HTTPCall("listSessionOfGroup", "groupID", $groupID);
  }

  // returns all sessions of an author
  function listSessionsOfAuthor($authorID)
  {
    return $this->HTTPCall("listSessionsOfAuthor", "authorID", $authorID);
  }

  // PAD CONTENT
  // Pad content can be updated and retrieved through the API

  // returns the text of a pad
  function getText($padID) // should take optional $rev
  {
    return $this->HTTPCall("getText", "padID", $padID);
  }

  // sets the text of a pad
  function setText($padID, $text)
  {
    return $this->HTTPCall("setText", "padID", $padID, "text", $text);
  }

  // PAD
  // Group pads are normal pads, but with the name schema
  // GROUPID$PADNAME. A security manager controls access of them and its
  // forbidden for normal pads to include a $ in the name.

  // creates a new pad
  function createPad($padID, $text)
  {
    if($text) {
      return $this->HTTPCall("createPad", "padID", $padID, "text", $text);
    } else {
      return $this->HTTPCall("createPad", "padID", $padID);
    }
  }

  // returns the number of revisions of this pad
  function getRevisionsCount($padID)
  {
    return $this->HTTPCall("getRevisionsCount", "padID", $padID);
  }

  // deletes a pad
  function deletePad($padID)
  {
    return $this->HTTPCall("deletePad", "padID", $padID);
  }

  // returns the read only link of a pad
  function getReadOnlyID($padID)
  {
    return $this->HTTPCall("getReadOnlyID", "padID", $padID);
  }

  // sets a boolean for the public status of a pad
  function setPublicStatus($padID, $publicStatus)
  {
    return $this->HTTPCall("setPublicStatus", "padID", $padID, "publicStatus", $publicStatus);
  }

  // return true of false
  function getPublicStatus($padID)
  {
    return $this->HTTPCall("getPublicStatus", "padID", $padID);
  }

  // returns ok or a error message
  function setPassword($padID, $password)
  {
    return $this->HTTPCall("setPassword", "padID", $padID, "password", $password);
  }

  // returns true or false
  function isPasswordProtected($padID)
  {
    return $this->HTTPCall("isPasswordProtected", "padID", $padID);
  }
}
?>