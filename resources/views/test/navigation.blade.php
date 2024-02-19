   <!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Snippet - BBBootstrap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link
      href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"
      rel="stylesheet"
    />

    <style>
      @import url("https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap");

      :root {
        --header-height: 2rem;
        --nav-width: 68px;
        --first-color: #306b3c;
        --first-color-light: #afa5d9;
        --white-color: 	#FFFFFF;
        --body-font: "Nunito", sans-serif;
        --normal-font-size: 1rem;
        --z-fixed: 100;
      }

      *,
      ::before,
      ::after {
        box-sizing: border-box;
      }

      body {
        
        position: relative;
        margin: var(--header-height) 0 0 0;
        padding: 0 1rem;
        font-family: var(--body-font);
        font-size: var(--normal-font-size);
        transition: 0.5s;
      }
      .navcolor{
            background-color:#306b3c;
        }

      a {
        text-decoration: none;
      }

      .header {
        width: 100%;
        height: var(--header-height);
        position: relative;
        top: 1cm;
        left: -0.5cm;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 1rem;
        z-index: var(--z-fixed);
        transition: 0.5s;
      }

      .header_toggle {
        color: var(--first-color);
        font-size: 1.5rem;
        cursor: pointer;
      }

      .header_img {
        width: 35px;
        height: 35px;
        display: flex;
        justify-content: center;
        border-radius: 50%;
        overflow: hidden;
      }

      .header_img img {
        width: 40px;
      }

      .l-navbar {
        position: fixed;
        top:1.4cm;
        bottom:20cm;
        left: -30%;
        width: var(--nav-width);
        height: 100vh;
        background-color: var(--first-color);
        padding: 0.5rem 1rem 0 0;
        transition: 0.5s;
        z-index: var(--z-fixed);
      }

      .nav {
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        overflow: hidden;
      }

      .nav_logo,
      .nav_link {
        display: grid;
        grid-template-columns: max-content max-content;
        align-items: center;
        column-gap: 1rem;
        padding: 0.5rem 0 0.5rem 1.5rem;
      }

      .nav_logo {
        margin-bottom: 2rem;
      }

      .nav_logo-name {
        color: var(--white-color);
        font-weight: 700;
      }

      .nav_link {
        position: relative;
        color: var(--first-color-light);
        margin-bottom: 1.5rem;
        transition: 0.3s;
      }

      .nav_link:hover {
        color: var(--white-color);
      }

      .nav_icon {
        font-size: 1.25rem;
      }

      .show {
        left: 0;
      }

      .body-pd {
        padding-left: calc(var(--nav-width) + 1rem);
      }

      

      .active::before {
        content: "";
        position: absolute;
        left: 0;
        width: 2px;
        height: 32px;
      }

      .height-100 {
        height: 100vh;
      }

      @media screen and (min-width: 768px) {
        body {
          padding-top:0px;
          margin: calc(var(--header-height) + 1rem) 0 0 0;
        }

        .header {
          height: calc(var(--header-height) + 2rem);
          padding: 0 2rem 0 calc(var(--nav-width) + 2rem);
        }

        .header_img {
          width: 40px;
          height: 40px;
        }

        .header_img img {
          width: 45px;
        }

        .l-navbar {
          left: 0;
          padding: 1rem 1rem 0 0;
        }

        .show {
          width: calc(var(--nav-width) + 156px);
        }

        .body-pd {
        padding-top:10px;
          padding-left: calc(var(--nav-width) + 90px);
        }
        #nav ul {
            list-style: none;
            text-align: center;
            }
        #nav ul li {
            display: inline-block;
            margin-left:7cm;
            }
        
      }
    </style>
    
  </head>
  <body id="body-pd"  >
    <header class="header "  id="header" >
      <div class="header_toggle">
        <i class="bx bx-menu-alt-left" id="header-toggle"></i>
      </div>
      <div class="header_img">
        <img src="https://i.imgur.com/hczKIze.jpg" alt="" />
      </div>
      <div class="l-navbar" id="nav-bar">
      <nav class="nav">
        <div>
          <div class="nav_list">
            <a id="contrat"  href="{{route('tests.index')}}" class="nav_link active" >
              <i class="bx bx-book-bookmark nav_icon"></i>
              <span class="nav_name">Contrat</span>
            </a>
            <a id="employee"  href="{{url('tests/indexEmployee')}}" class="nav_link">
              <i class="bx bx-user nav_icon"></i>
              <span class="nav_name">Employee</span>
            </a>
            <a id="numero"  href="{{ url('tests/showAll') }}" class="nav_link">
              <i class="bx bx-phone nav_icon"></i>
              <span class="nav_name">Numero</span>
            </a>
            <a id="affectation" href="{{url('tests/showAffectation')}}" class="nav_link">
              <i class="bx bx-user-check nav_icon"></i>
              <span class="nav_name">Affectation</span>
            </a>
          </div>
        </div>
        <!-- <a href="#" class="nav_link">
          <i class="bx bx-log-out nav_icon"></i>
          <span class="nav_name">SignOut</span>
        </a> -->
      </nav>
    </div>
    </header>
    </body>
    <script type="text/javascript">

      document.addEventListener("DOMContentLoaded", function (event) {
        const showNavbar = (toggleId, navId, bodyId, headerId) => {
          const toggle = document.getElementById(toggleId),
            nav = document.getElementById(navId),
            bodypd = document.getElementById(bodyId),
            headerpd = document.getElementById(headerId);

          // Validate that all variables exist
          if (toggle && nav && bodypd && headerpd) {
            toggle.addEventListener("click", () => {
              // show navbar
              nav.classList.toggle("show");
              // change icon
              toggle.classList.toggle("bx-x");
              // add padding to body
              bodypd.classList.toggle("body-pd");
              // add padding to header
              headerpd.classList.toggle("body-pd");
            });
          }
        };

        showNavbar("header-toggle", "nav-bar", "body-pd", "header");

        /*===== LINK ACTIVE =====*/

        
              });
    

     
    </script>
  
</html>
