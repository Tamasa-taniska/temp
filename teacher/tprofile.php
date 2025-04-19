<?php
session_start();
include("db_connect.php");

// Check if the user is logged in as faculty
if (!isset($_SESSION['faculty'])) {
    header("Location: index1.php"); // Redirect to login if not logged in
    exit();
}

// Get faculty info from session
$faculty = $_SESSION['faculty'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Faculty Profile</title>
    <link rel="stylesheet" href="tprofile.css">
</head>
<body>
<?php include("theader.php"); ?>

<div class="container">
    <div class="profile-photo">
        <img src="profile.jpg" alt="Faculty Photo" id="profile-photo">
        <input type="file" id="upload" name="photo" accept="image/*" onchange="updatePhoto()" style="margin-top: 10px;">
    </div>

    <div class="profile-infos">
        <h2>Faculty Details</h2>
        <div class="profile-info"><b>Faculty ID:</b> <?php echo $faculty['faculty_id']; ?></div>
        <div class="profile-info"><b>Name:</b> <?php echo $faculty['name']; ?></div>
        <div class="profile-info"><b>Mobile Number:</b> <?php echo $faculty['phone_number']; ?></div>
        <div class="profile-info"><b>Date of Birth:</b> <?php echo $faculty['DOB']; ?></div>
        <div class="profile-info"><b>Email:</b> <?php echo $faculty['email']; ?></div>
        <div class="profile-info"><b>Position:</b> <?php echo $faculty['designation']; ?></div>
        <div class="profile-info"><b>Address:</b> <?php echo $faculty['address']; ?></div>
        <div class="profile-info"><b>District:</b> <?php echo $faculty['district']; ?></div>
        <div class="profile-info"><b>State:</b> <?php echo $faculty['state']; ?></div>
        <div class="profile-info"><b>Pincode:</b> <?php echo $faculty['pincode']; ?></div>

        <button class="edit-button" onclick="editProfile()">Edit Profile</button>

    </div>
</div>
<!-- Edit form -->
<div id="edit-form" style="display: none;">
<form action="tupdate_profile.php" method="POST" enctype="multipart/form-data">

    <!-- Only include fields allowed to be updated -->

    <div class="edit-form">
        <label>Mobile Number:</label>
        <input type="text" name="phone_number" value="<?php echo $faculty['phone_number']; ?>">
    </div>

    <div class="edit-form">
        <label>Address:</label>
        <textarea name="address"><?php echo $faculty['address']; ?></textarea>
    </div>

    <div class="edit-form">
        <label>Pincode:</label>
        <input type="text" name="pincode" value="<?php echo $faculty['pincode']; ?>">
    </div>

    <div class="edit-form">
        <label>District:</label>
        <input type="text" name="district" value="<?php echo $faculty['district']; ?>">
    </div>

    <div class="edit-form">
        <label>State:</label>
        <input type="text" name="state" value="<?php echo $faculty['state']; ?>">
    </div>

    <div class="edit-form">
        <label>Change Photo:</label>
        <input type="file" name="photo" accept="image/*">
    </div>

    <button class="save-button" type="submit">Save Changes</button>
    <button class="cancel-button" type="button" onclick="cancelEdit()">Cancel</button>
</form>

    
</div>
<p style="text-align: right; margin: 10px;">
    <a href="logout.php" style="text-decoration: none; color: #fff; background-color: #f44336; padding: 5px 10px; border-radius: 5px;">Logout</a>
</p>
<script>
function editProfile() {
    document.getElementById("edit-form").style.display = "block";
    document.querySelector(".container").style.display = "none"; // Hide view mode
}

function cancelEdit() {
    document.getElementById("edit-form").style.display = "none";
    document.querySelector(".container").style.display = "flex"; // Show view mode
}

function updatePhoto() {
    const fileInput = document.getElementById("upload");
    const photo = document.getElementById("profile-photo");

    const file = fileInput.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            photo.src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
}
</script>

</body>
</html>
