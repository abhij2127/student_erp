<?php include('./backend/server.php');?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="./styles/admit.css">
    <meta charset="utf-8">
    <title>Adminssion</title>

  <body>

    <div class="floatbar">
      <div class="anclink">
        <div class="lft">
          <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#FFFFFF"><g><rect fill="none" height="24" width="24" x="0"/><path d="M12,8.89L12.94,12h2.82l-2.27,1.62l0.93,3.01L12,14.79l-2.42,1.84l0.93-3.01L8.24,12h2.82L12,8.89 M12,2l-2.42,8H2 l6.17,4.41L5.83,22L12,17.31L18.18,22l-2.35-7.59L22,10h-7.58L12,2L12,2z"/></g></svg>
        </div>
        <div class="rt">
          Achievements
        </div>
      </div>

      <div class="anclink">
        <div class="lft">
          <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#FFFFFF"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M20 2H4c-1.1 0-1.99.9-1.99 2L2 22l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm0 14H5.17l-.59.59-.58.58V4h16v12zm-9.5-2H18v-2h-5.5zm3.86-5.87c.2-.2.2-.51 0-.71l-1.77-1.77c-.2-.2-.51-.2-.71 0L6 11.53V14h2.47l5.89-5.87z"/></svg>
        </div>
        <div class="rt">
          Write us
        </div>
      </div>

      <div class="anclink">
        <div class="lft">
          <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#FFFFFF"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M20 4v12H8V4h12m0-2H8c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-8.5 9.67l1.69 2.26 2.48-3.1L19 15H9zM2 6v14c0 1.1.9 2 2 2h14v-2H4V6H2z"/></svg>
        </div>
        <div class="rt">
          Gallery
        </div>
      </div>

      <div class="anclink">
        <div class="lft">
          <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#FFFFFF"><rect fill="none" height="24" width="24"/><path d="M19,5h-2V3H7v2H5C3.9,5,3,5.9,3,7v1c0,2.55,1.92,4.63,4.39,4.94c0.63,1.5,1.98,2.63,3.61,2.96V19H7v2h10v-2h-4v-3.1 c1.63-0.33,2.98-1.46,3.61-2.96C19.08,12.63,21,10.55,21,8V7C21,5.9,20.1,5,19,5z M5,8V7h2v3.82C5.84,10.4,5,9.3,5,8z M12,14 c-1.65,0-3-1.35-3-3V5h6v6C15,12.65,13.65,14,12,14z M19,8c0,1.3-0.84,2.4-2,2.82V7h2V8z"/></svg>
        </div>
        <div class="rt">
          Events
        </div>
      </div>

    </div>


    <div class="header">
      <img src="./Resources/books.gif" alt="">
      <div class="overlay"></div>
      <div class="grad-over"></div>
      <div class="rgrad-over"></div>
      <div class="abscontain">
        <h1>Welcome aboard!</h1>
        <h2>Excited to join us?</h2>
        <div class="getPhno">
          <input type="text" name="" value="" placeholder="Enter your phone no. we will contact you" />
          <button type="button" name="button" value="get">Go
            <span class="svghold">
              <svg viewBox="0 0 6 12" xmlns="http://www.w3.org/2000/svg">
                <desc>chevron</desc>
                <path d="M.61 1.312l.78-.624L5.64 6l-4.25 5.312-.78-.624L4.36 6z" fill="none" fill-rule="evenodd"></path>
              </svg>
            </span>

          </button>
        </div>

      </div>


    </div>

    <div class="contain">
     <form class="admissionForm" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
	 
     <?php include('./backend/error.php'); ?>
	 
	 <fieldset>
		<legend>Admission Form</legend>
		
		<div class="admission-detils">
		<label for="Name">Name  </label>
		<input type="text" name="name" value="" placeholder="Enter your name" required />
		</div>
		
		<div class="admission-detils">
			<label for="Phone no.">Phone no. </label>
			<input type="text" name="Phno" value=""  placeholder="Enter your Phno." rquired />
		</div>
		
		
		<div class="admission-detils">
			<label for="email">Email(optional)  </label>
			<input type="email" name="email" value=""  placeholder="Enter your email adress" />
		</div>
		
		
		<div class="admission-detils">
			<label for="password">Create new Password  </label>
			<input type="password" name="password_1" value=""  placeholder="Password" required />
		</div>
		
		
		<div class="admission-detils">
			<label for="confirm">Confirm Password  </label>
			<input type="password" name="password_2" value="" placeholder="Password">
			
			<div class="admission-detils"></div>
			<label for="course">Course</label>
			<select name="course">
				<option value="A1">Course A1</option>
				<option value="A2">Course A2</option>
				<option value="A3">Course A3</option>
				<option value="A4">Course A4</option>
			</select>
		</div>
		
		
		<div class="admission-detils">
			 <input type="submit" name="admission" value="apply">
		</div>
   
	 </fieldset>
    
  </form>
    </div>





  </body>
  <script src="./index.js" charset="utf-8"></script>
</html>

