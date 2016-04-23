<html lang="en">
  <head>
    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="763231721442-hrd5flmnsh3539da8ln1put13g3ehmfd.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  </head>
  <body>
    <div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark"></div>
    <script>
      function onSignIn(googleUser) {
        var profile = googleUser.getBasicProfile();
        console.log("ID: " + profile.getId());
        console.log('Full Name: ' + profile.getName());
        console.log('Given Name: ' + profile.getGivenName());
        console.log('Family Name: ' + profile.getFamilyName());
        console.log("Image URL: " + profile.getImageUrl());
        console.log("Email: " + profile.getEmail());
        var id_token = googleUser.getAuthResponse().id_token;
        console.log("ID Token: " + id_token);

        // json for request
        var data = {};

        data.id = profile.getId();
        data.name = profile.getName();
        data.givenName = profile.getGivenName();
        data.familyName = profile.getFamilyName();
        data.imageUrl = profile.getImageUrl();
        data.email = profile.getEmail();
        
        $.post("login.php",data,function(e){
          console.log(e);
          if(e == 1){
            location.href = "home/index.php";
          }
        });
      };
    </script>
  </body>
</html>