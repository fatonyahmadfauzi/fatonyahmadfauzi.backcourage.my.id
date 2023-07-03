<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Registration Successful</title>

    <style>
        body {
            background: #1488EA;
        }

        #card {
            position: relative;
            width: 320px;
            display: block;
            margin: 40px auto;
            text-align: center;
            font-family: 'Source Sans Pro', sans-serif;
        }

        #upper-side {
            padding: 2em;
            background-color: #8BC34A;
            display: block;
            color: #fff;
            border-top-right-radius: 8px;
            border-top-left-radius: 8px;
        }

        #checkmark {
            font-weight: lighter;
            fill: #fff;
            margin: -3.5em auto auto 20px;
        }

        #status {
            font-weight: lighter;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 1em;
            margin-top: -.2em;
            margin-bottom: 0;
            }

        #lower-side {
            padding: 2em 2em 5em 2em;
            background: #fff;
            display: block;
            border-bottom-right-radius: 8px;
            border-bottom-left-radius: 8px;
        }

        #message {
            margin-top: -.5em;
            color: #757575;
            letter-spacing: 1px;
        }

        #contBtn {
            position: relative;
            top: 1.5em;
            text-decoration: none;
            background: #8bc34a;
            color: #fff;
            margin: auto;
            padding: .8em 3em;
            -webkit-box-shadow: 0px 15px 30px rgba(50, 50, 50, 0.21);
            -moz-box-shadow: 0px 15px 30px rgba(50, 50, 50, 0.21);
            box-shadow: 0px 15px 30px rgba(50, 50, 50, 0.21);
            border-radius: 25px;
            -webkit-transition: all .4s ease;
                    -moz-transition: all .4s ease;
                    -o-transition: all .4s ease;
                    transition: all .4s ease;
        }

        #contBtn:hover {
            -webkit-box-shadow: 0px 15px 30px rgba(50, 50, 50, 0.41);
            -moz-box-shadow: 0px 15px 30px rgba(50, 50, 50, 0.41);
            box-shadow: 0px 15px 30px rgba(50, 50, 50, 0.41);
            -webkit-transition: all .4s ease;
                    -moz-transition: all .4s ease;
                    -o-transition: all .4s ease;
                    transition: all .4s ease;
            }
    </style>
</head>
<body>
		
<!-- partial:index.partial.html -->
<div id='card' class="animated fadeIn">
  <div id='upper-side'>
    <script src="https://cdn.lordicon.com/bhenfmcm.js"></script>
    <lord-icon
        src="https://cdn.lordicon.com/lbsajkny.json"
        trigger="loop"
        delay="2000"
        colors="primary:#4be1ec,secondary:#cb5eee"
        style="width:250px;height:250px">
    </lord-icon>
      <h3 id='status'>
      Success
    </h3>
  </div>
  <div id='lower-side'>
    <p id='message'>
      Congratulations, your account has been successfully created.
    </p>
    <a href="<?php echo site_url('auth/login');?>" id="contBtn">Continue</a>
  </div>
</div>
<!-- partial -->