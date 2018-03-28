<?php
class UserModel
{
    //Model for grabbing data from users table within database
    public $userId; //user id associated with msql table slot
    public $username; //username that is displayed on app
    public $userPassword; //users password assocated with their account
    public $userFirstName; //users first name
    public $userLastName; //users last name
    public $userDob; //users date of birth
    public $userBio; //users biography on their account
    public $userInterest; //user interest or maybe interests?
    public $userJob; //users job maybe jobs?
    public $userEmployer; //users employer maybe employers?
    public $userIsSuspended; //users status on being suspended or not
    public $userIsPublic; //users status of being publicly displayed or not
    public $userProfilePictureId; //contains the link to the users profile picture

    //ask professor about the legitimacy with having an attribute in a model not be present in the database
    public $userFriends; //populate this with an array of friend id's
}
?>