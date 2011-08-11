<?php
class EtherpadLiteClient
{
  // GROUPS
  // Pads can belong to a group. There will always be public pads that doesnt belong to a group (or we give this group the id 0)
    
  // creates a new group 
  function createGroup()
  {
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
  }

  // deletes a session 
  function deleteSession($sessionID)
  {
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
  function getText($padID, $rev)
  {
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