<?php
class UserModel
{
    public $userID;//user id associated with msql table slot
    public $username;//username that is displayed on app
    public $userPassword;//users password assocated with their account
    public $userFirstName;//users first name
    public $userLastName;//users last name
    public $userDOB;//users date of birth
    //public $userAge;//users age | Not in the database
    public $userBio;//users biography on their account
    public $userInterest;//user interest or maybe interests?
    public $userJob;//users job maybe jobs?
    public $userEmployer;//users employer maybe employers?
    public $userIsSuspended;//users status on being suspended or not
    public $userIsPublic;//users status of being publicly displayed or not
    public $userProfilePicture;//contains the link to the users profile picture
}
?>