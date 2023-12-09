<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>CrisisCrew</title>
    <link rel="stylesheet" href="css\style.css" />
    <link rel="icon" href="images/CrisisCrew.png" type="image/x-icon">

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
  </head>



<style>
  label {
    color: white;
}
.btn-send {
    font-weight: 300;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    margin-bottom: 20px;
}

</style>







  <body>
    <ul class="nav justify-content-end">

        <li class="nav-item">
          <a class="nav-link" href="login.php">  <button type="button" class="btn btn-outline-dark btn-sm">
            Admin Log In
        </button></a>
        
        </li>
        <li class="nav-item">
            <a class="nav-link" href="client_login.php">  <button type="button" class="btn btn-outline-dark btn-sm" >
                Volunteer Log In
              </button></a>        </li>
      </ul>
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container">

        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

          <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
            <a class="navbar-brand" href="index.php"><img src="images/CrisisCrew.png" width="70px"></a>

            <li class="nav-item">
              <a class="nav-link" href="#banner">Discover Our Mission</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#What we Offer">What We Offer</a>
            </li>
        
            <li class="nav-item">
              <a class="nav-link" href="#features">Explore Our Key Features</a>
            </li>
          </ul>
        
        </div>
        
      </div>
    </nav>
</button>


    <section class="banner" id="banner"   >
        <div class="container">

            <div class="row">
            <div class="col-md-6">
                <h1 class="heading">
                <span>Save</span> a life
                <br />
                <span>Be</span> a hero
                </h1>
                <p class="desc" >
                  CrisisCrew is a revolutionary Disaster Response and Mitigation Platform tailored to effectively empower Volunteers and organizations. It is designed to streamline disaster response efforts. Our project aims to empower enterprises ,organisations and Volunteers with the tools they need to manage and respond to crisis situations effectively.

                </p>
                <button type="button" class="btn btn-outline-dark btn-sm">
                  <a href="register.php" style="text-decoration: none;"> Sign Up as Volunteer </a>
                 
                  </button>
               
            </div>
            <div class="col-md-6">
                <img src="images/work.png" alt="Image 1" class="img-fluid" />
            </div>
          
    
    </section>



    
<!-- About Section -->
<!-- About Section -->


<section class="impact" id="impact">

  <div class="container">
    <h3 class="workflow-header" style="font-family:Google Sans;">Why We Require Change: A Visual Contrast</h3>

    <div class="row align-items-center mt-5">
      <div class="col-md-6 col-sm-12">
        <img src="images/impact_before.png" alt=""  width="500px">
        <h5 style="font-family:Google Sans; text-align:center;">What It Is</h5>
      </div>
      <div class="col-md-6 col-sm-12">
        <img src="images/impact_after.png" alt=""  width="500px">
        <h5 style="font-family:Google Sans; text-align:center;">How It Should Be</h5>
        
        </div>
</section>
  

<section class="workflow" id="What we Offer">
  <div class="container">
      <h3 class="workflow-header "  style="font-family:Google Sans;" >What We Offer</h3>
      <p>CrisisCrew aims to be a comprehensive disaster management and Volunteers coordination platform.</p>
      <p>Here are your three objectives:</p>

      <div class="row justify-content-center">
          <div class="col-lg-4 col-md-6 col-sm-12">
              <div class="card h-100" style="width: 300px;">
                  <img src="images/1.webp" class="card-img-top" alt="IC4IRc">
                  <div class="card-body">
                      <h6 class="card-title"><b>Enhanced Volunteers Empowerment</b></h6>
                      <p class="card-text">Provide comprehensive resources, information, and tools to empower Volunteerss, enabling them to actively and efficiently participate in disaster response efforts within their communities.</p>
                  </div>
              </div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-12">
              <div class="card h-100" style="width: 300px;">
                  <img src="images/admin.jpg" class="card-img-top" alt="innovators">
                  <div class="card-body">
                      <h6 class="card-title"><b>Efficient Administrator Support</b></h6>
                      <p class="card-text">Offer innovative solutions and support to administrators and decision-makers involved in disaster management. This includes aiding in resource allocation, creating intuitive dashboards, and providing robust reporting tools to enhance their efficiency and decision-making processes.</p>
                  </div>
              </div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-12">
              <div class="card h-100" style="width: 300px;">
                  <img src="images/flood.gif" class="card-img-top" alt="innovators">
                  <div class="card-body">
                      <h6 class="card-title"><b>Seamless Crisis Coordination</b></h6>
                      <p class="card-text">Facilitate seamless crisis coordination through advanced features such as real-time event tracking, intelligent resource allocation algorithms, and efficient communication channels. Enable quick and effective coordination among stakeholders to enhance disaster response capabilities.</p>
                  </div>
                  
              </div>
          </div>
      </div>
  </div>
</section>


</section> 

<section class="service-section" id="features">

  <div class="container">
    <h3 class="workflow-header "  style="font-family:Google Sans;">Explore Our Key Features</h3>


    <div class="row">
      <div class="col-md-6 col-lg-6 col-12">
        <div class="icon-box">
          <p class="service-title"><a href="#">Comprehensive Guide to Volunteers:
          </a></p>
          <p class="service-para">Boost your disaster response capabilities with CrisisCrew's all-inclusive tools. Engage students through our gamified learning approach, progressing from Crisis Cadet to Crisis Commander. Be inspired by the stories of Crisis Heroes, and join a community dedicated to building resilient responders.

          </p>
        </div>
      </div>
      <div class="col-md-6 col-lg-6 col-12 mt-4 mt-md-0">
        <div class="icon-box">
          <p class="service-title"><a href="#">Professional Training and Workshops:
          </a></p>
          <p class="service-para">Elevate your team's skills with our intensive disaster response training. Access cutting-edge modules, workshops, and virtual reality simulations. Earn Certified Disaster Response Specialist (CDRS) certification for exclusive global disaster response job opportunities. Be prepared to save lives and make a difference.

          </p>
        </div>
      </div>
      <div class="col-md-6 col-lg-6 col-12 mt-4 mt-md-0">
        <div class="icon-box">
          <p class="service-title"><a href="#">Tailored Disaster Plans and Safety Checks:
          </a></p>
          <p class="service-para">Enroll in our Comprehensive Disaster Preparedness Program (CDPP) for tailored disaster plans, safety checks, and AI-powered corporate ratings. Enhance your organization's readiness and response capabilities. Prepare, respond, and thrive with our cutting-edge solutions.





          </p>
        </div>
      </div>
      <div class="col-md-6 col-lg-6 col-12 mt-4 mt-md-0">
        <div class="icon-box">
          <p class="service-title"><a href="#">Interactive Community Engagement:
          </a></p>
          <p class="service-para">Join our interactive community at CrisisHeros Blogs. Engage in discussions, share experiences, and celebrate exceptional contributions. Foster solidarity and purpose in crisis situations. Show your support using #CrisisCrew badges on social media, spreading awareness about our collective efforts.





          </p>
        </div>
      </div>
      <div class="col-md-6 col-lg-6 col-12 mt-4 mt-md-0">
        <div class="icon-box">
          <p class="service-title"><a href="#">Enterprise-Specific Insights & Geospatial Tools:
          </a></p>
          <p class="service-para">Access tailored data insights and real-time performance metrics for informed decision-making. Utilize offline geospatial tools with resource markers, exit routes, and navigational aids. Enhance your organization's disaster response capabilities with our cutting-edge solutions.


          </p>
        </div>
      </div>
      <div class="col-md-6 col-lg-6 col-12 mt-4 mt-md-0">
        <div class="icon-box">
          <p class="service-title"><a href="#">Real-Time Event Tracking and AI-Powered Post-Disaster Analysis:
          </a></p>
          <p class="service-para"> Harness the power of AI for seamless real-time event tracking, reporting, and post-disaster analysis. Access comprehensive data insights and analytics to enhance your disaster response capabilities. Be prepared to save lives and make a difference.

          </p>
        </div>
      </div>
    </div>
  </div>
</section>









<section class="footer" id="footer">
  <footer class="bg-dark text-light text-center py-4" id="footer
  ">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-6 col-12 mt-4 mt-md-0">
          <div class="form-container">
            <h5>Contact Us</h5>

            <form id="contact-form" method="post" action="contact.php" role="form">
        <div class="messages"></div>
        <div class="controls">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="form_name">First name *</label>
                <input id="form_name" type="text" name="name" class="form-control" placeholder="first name." required="required" data-error="First name is required.">
                <div class="help-block with-errors"></div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="form_lastname">Last name *</label>
                <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="last name." required="required" data-error="Last name is required.">
                <div class="help-block with-errors"></div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="form_email">Email *</label>
                <input id="form_email" type="email" name="email" class="form-control" placeholder="email." required="required" data-error="Valid email is required.">
                <div class="help-block with-errors"></div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="form_phone">Phone</label>
                <input id="form_phone" type="tel" name="phone" class="form-control" placeholder="phone number.">
                <div class="help-block with-errors"></div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="form_message">Message *</label>
                <textarea is="form_message" name="message" class="form-control" placeholder="Please type your message." rows="4" required="required" data-error="Please, type your message."></textarea>
                <div class="help-block with-errors"></div>
              </div>
            </div>
            <div class="col-md-12">
              <input type="submit" class="btn btn-success btn-sent" value="Send message">
            </div>
          </div>
            <div class="row">
              <div class="col-md-12">
                <p class="text-muted"><strong>*</strong>These fields are required.</p>
              </div>
          </div>
        </div>
      </form>



            
        </div>








        </div>
        <div class="col-md-6 col-lg-6 col-12 mt-4 mt-md-0">
          <!-- Content above the footer -->
      
          <!-- Footer -->
          <footer class="footer mt-4">
              <div class="container">
                  <div class="row">
                      <!-- Contact Information -->
                      <div class="col-md-6 col-lg-6 col-12 mt-4 mt-md-0">
                          <p>Email: <a href="mailto:info@crisidscrew.com"  style="color: white; text-decoration: none;">crisiscrew20@gmail.com
                          </a><br>
                             <a href="/privacy-policy" style="color: white; text-decoration: none;">Privacy Policy</a> <br>
                             <a href="/terms-of-use" style="color: white; text-decoration: none;">Terms of Use</a> <br>
                             <a href="/faq" style="color: white; text-decoration: none;">FAQ</a>
                       
                          
                      </div>
                      <!-- Quick Links -->
             
                      <!-- Social Media Links -->
                      <div class="col-md-6 col-lg-6 col-12 mt-4 mt-md-0">
                          <h4>Follow Us</h4>
                          <div class="social-icons">
                              <a href="#" class="social-link"  style="color: white;"><i class="fab fa-facebook"></i></a>
                              <a href="#" class="social-link"><i class="fab fa-twitter" style="color: white;"></i></a>
                              <a href="#" class="social-link"><i class="fab fa-linkedin-in" style="color: white;"></i></a>
                              <a href="#" class="social-link"><i class="fab fa-youtube" style="color: white;"></i></a>
                          </div>
                      </div>
                  </div>
                  <hr>
                  <div class="row">
                      <!-- Copyright and Credits -->
                      <div class="col-md-12">
                          <p class="footer-text">&copy; 2023 CrisisCrew. All Rights Reserved.</p>
                      </div>
                   
                  </div>
              </div>
          </footer>
      </div>
      
       
      </div>
    </div>
  </footer>

   </section>



   <script>

$(function () {

$('#contact-form').validator();

$('#contact-form').on('submit', function (e) {
    if (!e.isDefaultPrevented()) {
        var url = "contact.php";

        $.ajax({
            type: "POST",
            url: url,
            data: $(this).serialize(),
            success: function (data)
            {
                var messageAlert = 'alert-' + data.type;
                var messageText = data.message;

                var alertBox = '<div class="alert ' + messageAlert + ' alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' + messageText + '</div>';
                if (messageAlert && messageText) {
                    $('#contact-form').find('.messages').html(alertBox);
                    $('#contact-form')[0].reset();
                    $('body, html').animate({scrollTop:$('#contact-form').offset().top}, 'fast');
                }
            }
        });
        return false;
    }
})
});
   </script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>


    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="myscript.js"></script>
  </body>
</html>
