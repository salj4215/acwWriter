<div class="left">
    <?php
    /**
     * Created by PhpStorm.
     * User: Sal
     * Date: 10/16/2018
     * Time: 1:30 AM
     */
    $subject = $_POST['subject'];
    echo "<h1>$subject</h1>";

    function select_eReg() {
        echo '<input type="radio" id="eRegWrongUserName" name="eRegSubject" value="wrongUserName">Using Wrong Username<br>';
        echo '<input type="radio" id="eRegResetPassword" name="eRegSubject" value="resetPassword">Resetting Password<br>';
        echo '<input type="radio" id="eRegUnableSaveContinue" name="eRegSubject" value="unableSaveContinue">Unable to Save and Continue<br>';
    }

    function select_frontline() {
        echo '<input type="radio" id="frontlineNeedSubCreds" name="frontlineSubject" value="needSubCreds">Need Sub ID and Pin<br>';
        echo '<input type="radio" id="frontlineTeacherCreds" name="frontlineSubject" value="needTeacherCreds">Need Teacher ID and Pin<br>';
        echo '<input type="radio" id="frontlineCorIdPin" name="frontlineSubject" value="corIdPin">Correct ID and Pin<br>';
    }

    function select_pwReset() {
        echo '<input type="radio" id="pwResetResDDP" name="pwResetSubject" value="resDDP">Reset Password - DDP<br>';
        echo '<input type="radio" id="pwResPortal" name="pwResetSubject" value="resPortal">Reset Password - Portal<br>';
    }

    function select_KCN() {
        echo '<input type="radio" id="kcnActDisabled" name="kcnSubject" value="actDisabled">Account is disabled<br>';
        echo '<input type="radio" id="kcnResPwKcn" name="kcnSubject" value="resPwKcn">Resetting Jobseeker Password<br>';
        echo '<input type="radio" id="kcnMyDetails" name="kcnSubject" value="myDetails">Unable to access myDetails<br>';
    }

    function select_KSN() {
        echo '<input type="radio" id="ksnWkFlow" name="ksnSubject" value="wkFlow">Workflow Status Error<br>';
        echo '<input type="radio" id="ksnCodeTable" name="ksnSubject" value="codeTable">Adding Branches Code Table<br>';
    }

    function selectSalesforce() {
        echo '<input type="radio" id="salesforceLogin" name="salesforceLogin" value="login">Unable to log in<br>';
    }



    if ($subject == 'eReg')
    {
        select_eReg();
    }

    if ($subject == 'frontline')
    {
        select_frontline();
    }

    if ($subject == 'password reset')
    {
        select_pwReset();
    }

    if ($subject == 'KCN')
    {
        select_KCN();
    }

    if ($subject == 'KSN')
    {
        select_KSN();
    }

    if ($subject == 'salesforce')
    {
        selectSalesforce();
    }



    ?>



    <script type="text/javascript">
        var subject = "<?php echo $subject ?>"
    </script>

    <form action="https://cislinux.hfcc.edu/~sjahaf/acw/index.php" method="post">
        <button type="submit">Return to ACW Types</button>
    </form>
    <br>
    <br>
    <button type="button" onclick="promptValues(subject)">Next</button> <!--call the script -->
</div>

<div class="right">
    <p id="getPrompt"></p>
    <!-- To Do //Needs to be fixed in order to copy acw quicker than ctrl v or right click -->
    <!--<button type="button" onclick="copyText()">Copy ACW</button>-->
</div>

<script>
    //To Do - Create function to show prompts for selection on right side of page
    function promptValues(subject) {
        //var selectionValue; //this variable holds the subject value coming from the radio button

        // use the subject to determine which function to call
        if(subject == 'eReg') {
            if(document.getElementById('eRegWrongUserName').checked) {
                //selectionValue = document.getElementById('eRegWrongUserName').value;
                getUserEregAcw();
            }
            else if(document.getElementById('eRegResetPassword').checked) {
                //selectionValue = document.getElementById('eRegResetPassword').value;
                getPassEregAcw();
            }
            else if(document.getElementById('eRegUnableSaveContinue').checked) {
                //selectionValue = document.getElementById('eRegUnableSaveContinue').value;
                getPageEregAcw();
            }
        }
        else if(subject == 'frontline') {
            if(document.getElementById('frontlineNeedSubCreds').checked) {
                //selectionValue = document.getElementById('frontlineNeedSubCreds').value;
                getFrontlineSubCreds();
            }
            else if(document.getElementById('frontlineTeacherCreds').checked) {
                //selectionValue = document.getElementById('frontlineTeacherCreds').value;
                getFrontlineTeacherCreds();
            }
            else if(document.getElementById('frontlineCorIdPin').checked) {
                //selectionValue = document.getElementById('frontlineCorIdPin').value;
                getCorIdPinFrontline();
            }
        }
        else if(subject == 'password reset') {
            if(document.getElementById('pwResetResDDP').checked) {
                //selectionValue = document.getElementById('pwResetResDDP').value;
                getPwResetDDP();
            }
            else if(document.getElementById('pwResPortal').checked) {
                //selectionValue = document.getElementById('pwResPortal').value;
                getPwResetPortal();
            }
        }
        else if(subject == 'KCN') {
            if(document.getElementById('kcnActDisabled').checked) {
                //selectionValue = document.getElementById('kcnActDisabled').value;
                getKcnActDisabled();
            }
            else if(document.getElementById('kcnResPwKcn').checked) {
                //selectionValue = document.getElementById('kcnResPwKcn').value;
                getKcnPwReset();
            }
            else if(document.getElementById('kcnMyDetails').checked) {
                //selectionValue = document.getElementById('kcnMyDetails').value;
                getUnableMyDetails();
            }
        }
        else if(subject == 'KSN') {
            if(document.getElementById('ksnWkFlow').checked) {
                //selectionValue = document.getElementById('ksnWkFlow').value;
                getKsnWorkflow();
            }
            else if(document.getElementById('ksnCodeTable').checked) {
                //selectionValue = document.getElementById('ksnCodeTable').value;
				getKsnBranchAdd();
            }
        }
        else {
            if(document.getElementById('salesforceLogin').checked) {
                getSalesforceLogin();
            }
        }

        //prompt user to enter KSN ID and print acw for ereg username
        function getUserEregAcw() {
          var ksnId = prompt("Enter KSN ID: ");
          if (ksnId != null) {
              document.getElementById("getPrompt").innerHTML = "KSN ID: " + ksnId + "<br> cu unable to log in to eReg <br> advised cu to use username in email <br> cu able to log in <br> all set <br> cc";
          }
        }

        //prompt user to enter KSN ID and print acw for eReg password
        function getPassEregAcw() {
            var ksnId = prompt("Enter KSN ID: ");
            if (ksnId != null) {
                document.getElementById("getPrompt").innerHTML = "KSN ID: " + ksnId + "<br> cu unable to log in to eRegistration <br> cu needs password reset <br> resetting password using Forgot Password link in registration.kellyservices.com <br> cu received email <br> cu able to log in <br> all set <br> cc";
            }
        }

        //prompt user to enter KSN ID and eReg page and print acw for eReg password
        function getPageEregAcw() {
            var ksnId = prompt("Enter KSN ID: ");
            var page = prompt("Enter page title: ");
            if (ksnId != null && page != null) {
                document.getElementById("getPrompt").innerHTML = "KSN ID: " + ksnId + "<br>cu unable to save and continue on " + page + " page in eReg <br> advised cu to add/update <br> cu able to save and continue <br> all set <br> cc";
            }
        }

        //prompt user to enter KSN ID and print act for sub's frontline login
        function getFrontlineSubCreds() {
            var ksnId = prompt("Enter KSN ID: ");
            if (ksnId != null) {
                document.getElementById("getPrompt").innerHTML = "KSN ID: " + ksnId + "<br>cu is a sub <br> cu needs id and pin <br> val with ssn and zip <br> advised cu of id and pin <br> all set <br> cc";
            }
        }

        //print acw for teachers frontline login
        function getFrontlineTeacherCreds() {
            document.getElementById("getPrompt").innerHTML = "cu is a teacher <br> cu needs id and pin <br> advised cu of id and pin <br> all set <br> cc";
        }

        //print acw for correct id and pin for Frontline
        function getCorIdPinFrontline() {
            document.getElementById("getPrompt").innerHTML = "cu unable to log in to Frontline <br> cu is using correct id and pin <br> advised cu to go to mykelly.us <br> advised cu to go to Employee Logins -> Frontline Login <br> cu able to log in <br> all set <br> cc";
        }

        function getPwResetDDP() {
            document.getElementById("getPrompt").innerHTML = "cu needs pw reset <br> cu is on ddp screen <br> val with ssn and zip <br> reset pw to Welcome1 <br> cu able to log in <br> cu able to change pw at windows welcome screen <br> all set <br> cc";
        }

        function getPwResetPortal() {
            document.getElementById("getPrompt").innerHTML = "cu needs network pw reset <br> cu is working remote <br> advised cu to go to portal.ks <br> cu able to change pw <br> advised cu to log in to FC <br> advised cu to lock and unlock pc <br> all set <br> cc";
        }

        function getKcnActDisabled() {
            document.getElementById("getPrompt").innerHTML = "cu kcn account disabled <br> reactivated account in SF <br> all set <br> cc";
        }

        function getKcnPwReset() {
            document.getElementById("getPrompt").innerHTML = "cu needs kcn pw reset <br> reset pw in SF <br> advised cu to look for email with pw reset instructions <br> all set <br> cc";
        }

        function getUnableMyDetails() {
            var ksnId = prompt("Enter KSN ID: ");
            document.getElementById("getPrompt").innerHTML = "KSN ID: " + ksnId + "<br> cu unable to access myDetails <br> advised cu to fill out profile information <br> advised cu wait 24 hours for access to myDetails <br> all set <br> cc";
        }

        function getKsnWorkflow() {
            var errorType = prompt("Choose error type:\n 1: birthday - KSN correct \n 2: birthday - KSN incorrect \n 3: Tax ID mismatch - KSN correct \n 4: Tax ID mismatch - KSN incorrect \n 5: Duplicate Tax ID - First hire date \n 6: Duplicate Tax ID - No First hire date");
            var ksnId = prompt("Enter KSN ID: ");
            switch(errorType) {
                case "1":
                    document.getElementById("getPrompt").innerHTML = "KSN ID: " + ksnId + "<br> error in KSN after talent submitted eReg <br> e~birthday mismatch <br> KSN has correct date <br> advised cu to reinvite talent to eReg <br> advised cu to have talent enter correct date for birthday and submit <br> all set <br> cc";
                    break;
                case "2":
                    var birthday = prompt("Enter birthday: ");
                    document.getElementById("getPrompt").innerHTML = "KSN ID: " + ksnId + "<br> error in KSN after talent submitted eReg <br> e~birthday mismatch <br> KSN has wrong date <br> advised cu to enter correct date in KSN <br> birthday: " + birthday + " <br> KSN now has correct birthday <br> KSN still showing error <br> please advise";
                    break;
                case "3":
                    document.getElementById("getPrompt").innerHTML = "KSN ID: " + ksnId + "<br> error in KSN after talent submitted eReg <br> e~tax ID mismatch <br> KSN has correct tax ID <br> advised cu to reinvite talent to eReg <br> advised cu to have talent enter correct tax ID number and submit <br> all set <br> cc";
                    break;
                case "4":
                    document.getElementById("getPrompt").innerHTML = "KSN ID: " + ksnId + "<br> error in KSN after talent submitted eReg <br> e~tax ID mismatch <br> KSN has wrong tax ID <br> advised cu to enter correct tax ID number in KSN <br> KSN now has correct tax ID number <br> KSN still showing error <br> please advise";
                    break;
                case "5":
                    var otherKsnId = prompt("Enter other KSN ID with first hire date: ");
                    document.getElementById("getPrompt").innerHTML = "KSN ID: " + ksnId + "<br> error in KSN after talent submitted eReg <br> e~Duplicate tax ID with KSN " + otherKsnId + " <br> KSN " + otherKsnId + " has first hire date <br> advised cu to use KSN with first hire date <br> all set <br> cc";
                    break;
                case "6":
                    var otherKsnId = prompt("Enter other KSN ID: ");
                    document.getElementById("getPrompt").innerHTML = "KSN ID: " + ksnId + "<br> error in KSN after talent submitted eReg <br> e~Duplicate tax ID with KSN " + otherKsnId + " <br> neither records have first hire date <br> advised cu to move tax ID to record with error <br> cu saved tax ID to record with error <br> KSN still showing error <br> please advise";
                    break;
                default:
                    document.getElementById("getPrompt").innerHTML = "KSN ID: " + ksnId + "<br> error in KSN after talent submitted eReg <br> e~Processing error has occurred <br> please advise";
            }
        }

		function getKsnBranchAdd() {
			var branches = prompt("Enter branch numbers: ");
			var users = prompt("Enter users: ");
			if (branches != null && users != null) {
				document.getElementById("getPrompt").innerHTML = "cu needs branches added to users access in KSN <br> users: " + users + "<br> branches: " + branches + "<br> adding branches to users code table in KSN <br> all set <br> cc";
			}
		}

		function getSalesforceLogin() {
            document.getElementById("getPrompt").innerHTML = "cu unable to log in to Salesforce <br> advised cu to click on Use Custom Domain <br> advised cu to enter Kelly <br> advised cu to click continue <br> cu able to log in <br> all set <br> cc";
        }
        //function to copy acw text
        function copyText() {
            var copyText = document.getElementById("getPrompt");
            copyText.select();
            document.execCommand("copy");
            alert("Copied the text: " + copyText.value);
        }
    }
</script>