<?php
class EtherpadLiteClient
{
  
  // INIT
  // Functions to setup the object
  
  public $apikey = "";
  
  function setParams($userkey)
  {
    $this->apikey  = $userkey;
  }

  // GROUPS
  // Pads can belong to a group. There will always be public pads that doesnt belong to a group (or we give this group the id 0)
  
  // creates a new group 
  function createGroup()
  {
    $conn = curl_init("http://localhost:9001/api/1/createGroup");
    curl_exec($conn);
    curl_close($conn);
  }

  // this functions helps you to map your application group ids to etherpad lite group ids 
  function getMappedGroup4($groupMapper)
  {
  }

  // deletes a group 
  function deleteGroup($groupID)
  {
  }

  // returns all pads of this group
  function listPads($groupID)
  {
  }

  // creates a new pad in this group 
  function createGroupPad($groupID, $padName, $text)
  {
  }

  // AUTHORS
  // Theses authors are bind to the attributes the users choose (color and name). 

  // creates a new author 
  function createAuthor($name)
  {
  }

  // this functions helps you to map your application author ids to etherpad lite author ids 
  function getMappedAuthor4($authorMapper, $name)
  {
  }

  // SESSIONS
  // Sessions can be created between a group and a author. This allows
  // an author to access more than one group. The sessionID will be set as
  // a cookie to the client and is valid until a certian date.

  // creates a new session 
  function createSession($groupID, $authorID, $validUntil)
  {
    $conn = curl_init("http://localhost:9001/api/1/createSession?groupID=$groupID&authorID=$authorID&validUntil=$validUntil&apikey=$this->apikey");
    curl_setopt($conn,CURLOPT_HTTPGET,1);
    curl_exec($conn);
    curl_close($conn);
  }

  // deletes a session 
  function deleteSession($sessionID)
  {
    $conn = curl_init("http://localhost:9001/api/1/createSession?sessionID=$sessionID");
    curl_setopt($conn,CURLOPT_POSTFIELDS, "WRH5p6kFPdmvZInvjzDGGuYYA6aufTkj");
    curl_exec($conn);
    curl_close($conn);
  }

  // returns informations about a session 
  function getSessionInfo($sessionID)
  {
  }

  // returns all sessions of a group 
  function listSessionsOfGroup($groupID)
  {
  }

  // returns all sessions of an author 
  function listSessionsOfAuthor($authorID)
  {
  }

  // PAD CONTENT
  // Pad content can be updated and retrieved through the API

  // returns the text of a pad 
  function getText($padID) // should take optional $rev
  {
    $conn = curl_init("http://localhost:9001/api/1/getText&padID=$padID");
    curl_exec($conn);
    curl_close($conn);
  }

  // sets the text of a pad 
  function setText($padID, $text)
  {
  }

  // PAD
  // Group pads are normal pads, but with the name schema
  // GROUPID$PADNAME. A security manager controls access of them and its
  // forbidden for normal pads to include a $ in the name.

  // creates a new pad
  function createPad($padID, $text)
  {
    // where do I send the data?:)
    $conn = curl_init("http://localhost:9001/api/1/createPad?padID=$padID&text=$text");
    curl_setopt($conn, CURLOPT_POSTFIELDS, "padID=$padID&text=$text");
    curl_exec($conn);
    curl_close($conn);
  }

  // returns the number of revisions of this pad 
  function getRevisionsCount($padID)
  {
  }

  // deletes a pad 
  function deletePad($padID)
  {
  }

  // returns the read only link of a pad 
  function getReadOnlyID($padID)
  {
  }

  // sets a boolean for the public status of a pad 
  function setPublicStatus($padID, $publicStatus)
  {
  }

  // return true of false 
  function getPublicStatus($padID)
  {
  }

  // returns ok or a error message 
  function setPassword($padID, $password)
  {
  }

  // returns true or false 
  function isPasswordProtected($padID)
  {
  }
}
?> 