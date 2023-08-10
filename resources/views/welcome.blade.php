<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Smart Management System</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--tw-bg-opacity: 1;background-color:rgb(255 255 255 / var(--tw-bg-opacity))}.bg-gray-100{--tw-bg-opacity: 1;background-color:rgb(243 244 246 / var(--tw-bg-opacity))}.border-gray-200{--tw-border-opacity: 1;border-color:rgb(229 231 235 / var(--tw-border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{--tw-shadow: 0 1px 3px 0 rgb(0 0 0 / .1), 0 1px 2px -1px rgb(0 0 0 / .1);--tw-shadow-colored: 0 1px 3px 0 var(--tw-shadow-color), 0 1px 2px -1px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000),var(--tw-ring-shadow, 0 0 #0000),var(--tw-shadow)}.text-center{text-align:center}.text-gray-200{--tw-text-opacity: 1;color:rgb(229 231 235 / var(--tw-text-opacity))}.text-gray-300{--tw-text-opacity: 1;color:rgb(209 213 219 / var(--tw-text-opacity))}.text-gray-400{--tw-text-opacity: 1;color:rgb(156 163 175 / var(--tw-text-opacity))}.text-gray-500{--tw-text-opacity: 1;color:rgb(107 114 128 / var(--tw-text-opacity))}.text-gray-600{--tw-text-opacity: 1;color:rgb(75 85 99 / var(--tw-text-opacity))}.text-gray-700{--tw-text-opacity: 1;color:rgb(55 65 81 / var(--tw-text-opacity))}.text-gray-900{--tw-text-opacity: 1;color:rgb(17 24 39 / var(--tw-text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--tw-bg-opacity: 1;background-color:rgb(31 41 55 / var(--tw-bg-opacity))}.dark\:bg-gray-900{--tw-bg-opacity: 1;background-color:rgb(17 24 39 / var(--tw-bg-opacity))}.dark\:border-gray-700{--tw-border-opacity: 1;border-color:rgb(55 65 81 / var(--tw-border-opacity))}.dark\:text-white{--tw-text-opacity: 1;color:rgb(255 255 255 / var(--tw-text-opacity))}.dark\:text-gray-400{--tw-text-opacity: 1;color:rgb(156 163 175 / var(--tw-text-opacity))}.dark\:text-gray-500{--tw-text-opacity: 1;color:rgb(107 114 128 / var(--tw-text-opacity))}}
        </style>

        <style>
          @import url('https://fonts.googleapis.com/css2?family=Archivo:wght@100;200;300;400;500;600;700;800;900&display=swap');
*{
  font-family: 'Archivo', sans-serif;
}
html,
body {
  height: 100%;
}
body {
  font-size: 15px;
}
.wrapper {
  min-height: 100%;
  margin-bottom: -344px;
}
.wrapper:after {
  content: "";
  display: block;
  height: 344px;
}
.footer {
  height: 344px;
}
h1,
h2,
h3,
h4,
h5,
h6 {
  font-family: "open sans", arial, sans-serif;
  font-weight: 300;
}
p {
  color: #444;
  font-size: 15px;
}
a {
  color: #1ABC9C;
  transition: all 0.4s ease-in-out;
}
a:hover{
  text-decoration: none;
  color: gray;
}
a:focus{
  text-decoration: none;
}
.btn{
  transition: all 0.4s ease-in-out;
  border-radius: 0;
  box-shadow: none;
}
.btn:focus{
  -webkit-box-shadow: none;
  -moz-box-shadow: none;
  box-shadow: none;
}
.btn .svg-inline--fa {
  color: #1ABC9C;
  margin-right: 5px;
}
.btn .svg-inline--fa.fa-search{
  margin-right: 0;
}
.btn-theme {
  background: rgb(247, 247, 247);
  color: #1ABC9C;
  border-radius: 5px;
}
.btn-theme:hover{
  background: rgb(219, 219, 219);
  color: black;
  text-shadow: 0px 0px 10px #1ABC9C;
}
a.btn-cta,
.btn-cta{
  color: #fff;
  padding: 10px 10px;
  font-size: 18px;
  line-height: 1.33;
}
a.btn-cta:hover,
.btn-cta:hover{
  color: #fff;
  background: grey;
}
a.btn-cta .svg-inline--fa,
.btn-cta .svg-inline--fa{
  margin-right: 10px;
  font-size: 20px;
  color: #fff;
}
.form-control{
  border-radius: 0;
  border-color: #e8e8e8;
}
.form-control::-webkit-input-placeholder{
  color: #a6a6a6;
}
.form-control:-moz-placeholder{
  color: #a6a6a6;
}
.form-control::-moz-placeholder{
  color: #a6a6a6;
}
.form-control:-ms-input-placeholder{
  color: #a6a6a6;
}
.form-control:focus{
  border-color: #1ABC9C;
  -webkit-box-shadow: none;
  -moz-box-shadow: none;
  box-shadow: none;
}
blockquote {
  font-size: 14px;
}
blockquote p{
  font-size: 14px;
  line-height: 1.5;
}
.RedDamask{
  background-color: #e27240;
}
.RedDamask:hover {
  background-color: #df622a;
}
.FireBush{
  background-color: #e28d40;
}
.FireBush:hover{
  background-color: #df802a;
}
.OliveDrab{
  background-color: #60a823;
}
.OliveDrab:hover{
  background-color: #54931f;
}
.Mojo{
  background-color: #c94139;
}
.Mojo:hover{
  background-color: #b73932;
}
.text-highlight{
  color: #27435a;
}
.highlight-border {
  border-color: #6091ba;
}
.read-more{
  transition: all 0.4s ease-in-out;
  font-size: 15px;
  display: block;
}
.read-more .svg-inline--fa{
  position: relative;
  top: 1px;
  margin-left: 5px;
}
.read-more:hover{
  text-decoration: none;
}
.carousel-fade .item{
  opacity: 0;
  transition: opacity 0.3s;
}
.carousel-fade .item.active{
  -webkit-opacity: 1;
  -moz-opacity: 1;
  opacity: 1;
}
#topcontrol{
  background: #84aac9;
  color: #fff;
  text-align: center;
  display: inline-block;
  width: 35px;
  height: 35px;
  border: none;
  border-radius: 2px;
  transition: all 0.4s ease-in-out;
}
#topcontrol:hover{
  background: #6091ba;
}
.row-end{
  margin-right: 0;
  padding-right: 0;
}
ul.custom-list-style li{
  list-style: none;
}
.date-label{
  background: #f5f5f5;
  display: inline-block;
  width: 40px;
  height: 50px;
  text-align: center;
  font-size: 15px;
}
.date-label .month{
  background: #1ABC9C;
  color: #fff;
  display: block;
  font-size: 15px;
  text-transform: uppercase;
}
.date-label .date-number{
  clear: left;
  display: block;
  padding-top: 5px;
  font-size: 15px;
  font-weight: 500;
}
.pagination-container{
  margin-top: 30px;
}
.page-link{
  color: #1ABC9C;
}
.page-item.active .page-link{
  background: #1ABC9C;
  border-color: #1ABC9C;
}
.page-item:first-child .page-link{
  border-radius: 0;
}
.page-item:last-child .page-link{
  border-radius: 0;
}
.nav-tabs{
  border-bottom: none;
  position: relative;
  margin-bottom: -1px;
}
.tab-content{
  border: 1px solid #e8e8e8;
  padding: 15px;
  margin-bottom: 20px;
}
.nav .nav-item .nav-link{
  font-size: 15px;
  border-radius: 0;
}
.nav-tabs .nav-link{
  border: 1px solid #e8e8e8;
  border-bottom: none;
}
.nav-tabs .nav-link:hover{
  background: none;
}
.nav-tabs .nav-link.active{
  border-top: 2px solid #1ABC9C;
  border-top-left-radius: 5px;
  border-top-right-radius: 5px;
}
.nav-tabs .nav-link.active:hover{
  border-bottom: none;
}
.nav-tabs > li > a{
  border: 1px solid #e8e8e8;
  border-bottom: none;
  background: #f5f5f5;
  padding: 5px 15px;
  margin-right: 0;
  border-radius: 0;
  color: #444;
  transition: all 0s;
}
.nav-tabs > li{
  margin-right: 2px;
}

.faq-wrapper .card{
  border-radius: 0;
  margin-bottom: 15px;
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
  border-color: #e8e8e8;
}
.faq-wrapper .card .card-header{
  background: none;
  border: none;
  border-radius: 0;
}
.faq-wrapper .card .card-header .card-title a{
  color: #1ABC9C;
}
.faq-wrapper .card .card-header .card-title a .svg-inline{
  margin-right: 5px;
}
.faq-wrapper .card .card-body{
  font-size: 13px;
}
.card{
  border-radius: 0;
}
.card .card-header{
  border-radius: 0;
}
.card .card-header .card-title{
  margin-bottom: 0;
}
.card .card-header h3.card-title{
  font-weight: 500;
  margin-bottom: 0;
  font-size: 18px;
}
.card .card-header .badge{
  font-size: 11px;
  padding: 5px 10px;
}
.card .card-footer{
  border-radius: 0;
}
.card .card-footer ul{
  margin-bottom: 0;
}
.card .card-footer ul.list-inline li{
  margin-bottom: 0;
}
.card .card-footer small{
  color: #999;
}
.no-margins{
  margin: 0;
}
.no-margin-left{
  margin-left: 0;
}
.no-margin-right{
  margin-right: 0;
}
.no-margin-top{
  margin-top: 0;
}
.no-margin-bottom{
  margin-bottom: 0;
}
.label{
  border-radius: 0;
}
.label.label-theme{
  background: #6091ba;
}
.label .svg-inline--fa{
  margin-right: 4px;
}
.label.label-icon-only .svg-inline--fa{
  margin-right: 0;
}
.badge{

  border-radius: 0;
}
.badge.badge-theme{
  background: #6091ba;
}
.badge.badge-default{
  background: #999;
}
.badge.badge-primary{
  background: #428bca;
}
.badge.badge-success{
  background: #5cb85c;
}
.badge.badge-info{
  background: #5bc0de;
}
.badge.badge-info{
  background: #5bc0de;
}
.badge.badge-warning{
  background: #f0ad4e;
  color: #fff;
}
.badge.badge-danger{
  background: #d9534f;
}
.promo-badge{
  font-size: 20px;
  display: table;
}
.promo-badge a{
  color: #fff;
  display: table-cell;
  width: 135px;
  height: 135px;
  text-align: center;
  vertical-align: middle;
  border-radius: 50%;
  border: 5px solid #fff;
  box-shadow: 0px 0px 1px 1px rgba(0, 0, 0, 0.1);
}
.promo-badge .percentage{
  font-size: 32px;
  font-weight: 500;
  color: #fff;
  position: relative;
}
.promo-badge .percentage .off{
  font-size: 11px;
  position: absolute;
  top: 15px;
  right: -15px;
}
.promo-badge .desc{
  font-size: 12px;
}
.progress-bar-theme{
  background: #6091ba;
}
.gallery-album .item{
  margin-bottom: 15px;
}
.gallery-album .item a{
  border: 1px solid #e8e8e8;
  padding: 4px;
  display: inline-block;
}
.gallery-album .item a:hover{
  box-shadow: 0px 0px 5px 0px #e8e8e8;
}
.blueimp-gallery > .slides > .slide > .slide-content,
.blueimp-gallery > .prev,
.blueimp-gallery > .next,
.blueimp-gallery > .close,
.blueimp-gallery > .play-pause{
  color: #fff !important;
}
#cboxLoadedContent,
#cboxContent{
  background: none;
}
.box{
  background: #f5f5f5;
  padding: 30px;
}
.box.box-border{
  border-left: 5px solid #1ABC9C;
}
.box.box-dark{
  background: #444;
  color: #fff;
}
.box.box-theme{
  background: #6091ba;
  color: #fff;
}
.box .date-label{
  background: #fff;
}
.social-icons{
  list-style: none;
  padding-top: 10px;
  margin-bottom: 0;
}
.social-icons li{
  float: left;
}
.social-icons li.row-end{
  margin-right: 0;
}
.social-icons a{
  display: inline-block;
  width: 32px;
  height: 32px;
  text-align: center;
  padding-top: 4px;
  border-radius: 50%;
  font-size: 18px;
  margin-right: 10px;
  float: left;
}
.social-icons a .svg-inline--fa{
  color: #fff;
}
.social-icons a .svg-inline--fa:before{
  font-size: 18px;
  text-align: center;
  padding: 0;
}
.header .top-bar{
  background: #1ABC9C;
}
.header .top-bar .search-form{
  padding: 10px 0;
}
.header .top-bar .search-form .form-group{
  display: inline-block;
  margin-bottom: 0;
  vertical-align: middle;
}
.header .top-bar .search-form .form-control{
  font-size: 13px;
}
.header .top-bar .search-form .btn{
  font-size: 13px;
}
.header .social-icons li.row-end{
  margin-right: 0;
}
.header .social-icons a .svg-inline--fa{
  color: white;
  font-size: 25px;
}

.header .header-main{
  padding-top: 10px;
  padding-bottom: 2px;
}
.header h1.logo{
  margin-top: 0;
  margin-bottom: 0;
}
#logo{
   width: 100px;
}
.header .menu-top{
  list-style: none;
  margin: 0;
  padding: 0;
  text-align: right;
  float: right;
}
.header .menu-top li{
  list-style: none;
  float: left;
  font-size: 11px;
}
.header .menu-top li:last-child a{
  padding-right: 0;
}
.header .menu-top li.divider a{
  border-right: 1px solid #c4c4c4;
}
.header .menu-top li a{
  display: inline-block;
  color: #777;
  padding: 0px 10px;
}
.header .menu-top li a:hover{
  color: #1ABC9C;
}
.header .contact{
  font-size: 20px;
  font-weight: 300;
  margin-top: 10px;
}
.header .contact p{
  float: left;
  margin-bottom: 0;
}
.header .contact p.phone{
  margin-right: 30px;
}
.header .contact p a{
  color: #444;
}
.header .contact p a:hover{
   text-shadow: 0px 0px 10px #1ABC9C;
}
.header .contact .svg-inline--fa{
  color: #1ABC9C;
  margin-right: 8px;
  font-size: 18px;
  position: relative;
  top: 1px;
}
.header .contact .svg-inline--fa.fa-phone{
  font-size: 20px;
  top: 2px;
}
.header .search-form{
  border: 0;
  box-shadow: none;
}
.header .search-form .form-control{
  width: 260px;
  background: #f5f5f5;
  transition: all 0.4s ease-in-out;
}
.header .search-form .form-control:focus{
  background: #fff;
  border-color: grey;
}
.main-nav-wrapper{
  background: #1ABC9C;
  margin-bottom: 30px;
  min-height: 50px;
}
.main-nav{
  padding: 0;
  width: 1100px;
}
marquee{
  font-size: 25px;
  padding-top: 8px;
  color: white;
  padding-left: 10px;
  border-left: 3px solid white;
}
.main-nav .navbar-toggler{
  position: relative;
  margin-bottom: 15px;
  right: 0;
  top: 9px;
  padding: 9px 10px;
  background-image: none;
  border: 1px solid transparent;
}
.main-nav button{
  background: #27435a;
  color: #fff !important;
  border-radius: 0;
}
.main-nav button:focus{
  outline: none;
}
.main-nav button .icon-bar{
  background-color: #fff;
  display: block;
  width: 22px;
  height: 2px;
  border-radius: 1px;
}
.main-nav button .icon-bar + .icon-bar{
  margin-top: 4px;
}
.main-nav .navbar-collapse{
  padding: 0;
}
.main-nav .nav .nav-item{
  font-weight: 600;
  text-transform: uppercase;
  z-index: 100;
  position: relative;
}
.main-nav .nav .nav-item.dropdown{
  z-index: 101;
}
.main-nav .nav .nav-item.dropdown a{
  font-size: 15px;
}
.main-nav .nav .nav-item.show .nav-link{
  background: #1ABC9C;
}
.main-nav .nav .nav-item.show .nav-link:hover{
  background: #1ABC9C;
}
.main-nav .nav .nav-item .nav-link{
  color: #ffffff;
  transition: all 0.4s ease-in-out;
  padding: 15px;
  background: #1ABC9C;
}
.main-nav .nav .nav-item .nav-link:hover{
  background: #74a198;
  color: #fff;
  border-radius:5px;
}
.main-nav .nav .nav-item .nav-link.active{
  background: #4678a1;
  color: #fff;
}
.main-nav .nav .nav-item .nav-link.active:before{
  content: "";
  display: block;
  width: 0;
  height: 0;
  border-left: 8px solid transparent;
  border-right: 8px solid transparent;
  border-bottom: 8px solid #fff;
  position: absolute;
  left: 50%;
  margin-left: -8px;
  bottom: -1px;
}
.main-nav .nav .nav-item .nav-link.active.dropdown-toggle:before{
  display: none;
}
.main-nav .nav .nav-item .dropdown-toggle:after{
  display: none;
}
.main-nav .nav .nav-item.open a{
  background: #4678a1;
  color: #fff;
}
.main-nav .nav .nav-item .dropdown-menu{
  border-radius: 0;
  margin: 0;
  border: none;
  padding: 0;
  min-width: 220px;
}
.main-nav .nav .nav-item .dropdown-menu a{
  padding: 8px 20px;
  text-transform: none;
  font-size: 15px;
  background: white;
  color: black;
}
.main-nav .nav .nav-item .dropdown-menu a:hover{
  background: #1ABC9C;
  color: #fff;
  padding-left: 24px;
}
.main-nav .nav .nav-item .dropdown-submenu{
  position: relative;
}
.main-nav .nav .nav-item .dropdown-submenu .svg-inline--fa{
  position: absolute;
  right: 15px;
  top: 10px;
}
.main-nav .nav .nav-item .dropdown-submenu li{
  position: relative;
}
.main-nav .nav .nav-item .dropdown-submenu li .svg-inline--fa{
  position: absolute;
  right: 15px;
  top: 10px;
}
.main-nav .nav .nav-item .dropdown-submenu > .dropdown-menu{
  top: 0;
  left: 100%;
  margin-top: 0px;
  margin-left: -1px;
}
.footer{
  background: #444;
  color: #fff;
}
.footer p{
  color: #dcdcdc;
}
.footer ul{
  padding-left: 0;
}
.footer li{
  list-style: none;
}
.footer h3{
  margin-top: 0;
  margin-bottom: 20px;
  font-size: 24px;
}
.footer .footer-content{
  padding: 30px 0;
  font-size: 12px;
  min-height: 300px;
}
.footer .footer-content .footer-col .footer-col-inner{
  padding: 0 15px;
}
.footer .footer-content .footer-col .svg-inline--fa{
  margin-right: 10px;
  display: inline-block;
  color: #767676;
}
.footer .footer-content .footer-col .svg-inline--fa.fa-phone{
  font-size: 16px;
}
.footer .footer-content .footer-col li{
  margin-bottom: 10px;
  font-size: 12px;
}
.footer .footer-content .footer-col a{
  color: #dcdcdc;
}
.footer .footer-content .footer-col a:hover{
  color: rgb(255, 76, 76);
}
.footer .footer-content .adr{
  margin-bottom: 30px;
}
.footer .footer-content .adr .svg-inline--fa{
  font-size: 16px;
  margin-top: 2px;
}
.footer .footer-content .subscribe-form{
  padding: 0;
}
.footer .footer-content .subscribe-form .form-group{
  display: inline-block;
  margin-bottom: 0;
  vertical-align: middle;
}
.footer .footer-content .subscribe-form .form-control{
  width: 320px;
  background: #f5f5f5;
  border: none;
  transition: all 0.4s ease-in-out;
  font-size: 15px;
}
.footer .footer-content .subscribe-form .form-control:focus{
  background: #fff;
}
.footer .footer-content .subscribe-form .btn{
  font-size: 15px;
}
.footer .bottom-bar{
  background: #2b2b2b;
  padding: 5px 0;
}
.footer .bottom-bar .copyright{
  font-size: 11px;
  color: #dcdcdc;
  line-height: 3;
}
.footer .bottom-bar .copyright a:hover{
  color: #84aac9;
}
.footer .bottom-bar .social{
  margin: 0;
}
.footer .bottom-bar .social li{
  float: right;
  margin-left: 10px;
  text-align: center;
  font-size: 18px;
  line-height: 2;
}
.footer .bottom-bar .social li a{
  color: #a9a9a9;
  padding: 0 5px;
}
.footer .bottom-bar .social li a:hover{
  color: #6091ba;
}
.flexslider{
  border-radius: 0;
  box-shadow: 0 0 0;
  border: 0;
}
.flexslider .flex-control-nav{
  bottom: -35px;
}
.flexslider .flex-control-paging li a{
  background: #a1a1a1;
}
.flexslider .flex-control-paging li a:hover{
  background: #6091ba;
}
.flexslider .flex-control-paging li a.flex-active{
  background: #6091ba;
}
.flexslider .slides li{
  position: relative;
}
.flexslider .slides .flex-caption{
  position: absolute;
  left: 30px;
  bottom: 30px;
  color: #fff;
  display: inline-block;
}
.flexslider .slides .flex-caption .main{
  display: inline-block;
  background: #1ABC9C;
  margin-bottom: 5px;
  padding: 10px 15px;
  font-size: 18px;
  text-transform: uppercase;
}
.flexslider .slides .flex-caption .secondary{
  display: inline-block;
  background: rgba(0, 0, 0, 0.8);
  padding: 5px 15px;
  color: #fff;
  font-size: 16px;
}
.flexslider .slides .promo-badge{
  position: absolute;
  right: 60px;
  top: 30px;
}
.page-wrapper .page-heading{
  margin-bottom: 30px;
  border-bottom: 1px solid #e8e8e8;
}
.page-wrapper .page-heading h1.heading-title{
  margin-top: 0;
  display: inline-block;
  font-size: 28px;
}
.page-wrapper .breadcrumbs{
  display: inline-block;
}
.page-wrapper .breadcrumbs ul{
  padding-top: 25px;
  margin: 0;
}
.page-wrapper .breadcrumbs ul li{
  color: #1ABC9C;
  font-size: 12px;
  float: left;
  list-style: none;
  display: inline-block;
}
.page-wrapper .breadcrumbs ul li a{
  display: inline-block;
  padding: 0 5px;
  color: #aaa;
}
.page-wrapper .breadcrumbs ul li a:hover{
  color: #365d7e;
}
.page-wrapper .breadcrumbs ul li.breadcrumbs-label{
  padding-right: 0;
  color: #aaa;
}
.page-wrapper .breadcrumbs ul li.current{
  max-width: 250px;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}
.page-wrapper .breadcrumbs ul li .svg-inline--fa{
  margin-right: 5px;
  color: #aaa;
}
.page-wrapper ul li{
  margin-bottom: 5px;
}
.page-wrapper ul li .svg-inline--fa{
  margin-right: 5px;
  color: #1ABC9C;
}
.page-wrapper ul li.list-group-item{
  margin-bottom: -1px;
}
.page-wrapper ul.nav li {
  margin-bottom: 0;
}
.page-wrapper ul.social-icons li .svg-inline--fa{
  margin-right: 0;
  color: #fff;
}
.page-wrapper ol li{
  margin-bottom: 5px;
}
.page-wrapper dl dd{
  margin-bottom: 5px;
}
.page-wrapper .page-content h1{
  font-size: 26px;
  font-weight: normal;
}
.page-wrapper .page-content h2{
  font-size: 24px;
  font-weight: normal;
}
.page-wrapper .page-content h3{
  font-size: 20px;
  font-weight: normal;
}
.page-wrapper .page-content h4{
  font-size: 18px;
  font-weight: normal;
}
.page-wrapper .page-content h5{
  font-size: 16px;
  font-weight: normal;
}
.page-wrapper .page-content h6{
  font-size: 14px;
  font-weight: normal;
}
.page-wrapper .page-content .title{
  margin-top: 0;
  margin-bottom: 15px;
  font-weight: 300;
}
.page-wrapper .page-content .page-row{
  margin-bottom: 30px;
}
.page-wrapper .page-content .custom-quote{
  border-left: 4px solid #1ABC9C;
  padding-left: 15px;
  padding-top: 10px;
  padding-bottom: 10px;
}
.page-wrapper .page-content .custom-quote p{
  font-size: 14px;
  color: #777;
  line-height: 1.5;
}
.page-wrapper .page-content .custom-quote .svg-inline--fa{
  color: #6091ba;
  margin-right: 10px;
}
.page-wrapper .page-content .custom-quote .people{
  margin-top: 10px;
  margin-bottom: 0;
  font-size: 11px;
  color: #444;
  font-style: normal;
}
.page-wrapper .page-content .custom-quote .people .name{
  color: #1ABC9C;
}
.page-wrapper .page-content .has-divider{
  border-bottom: 1px dotted #e8e8e8;
  padding-bottom: 15px;
}
.page-wrapper .page-content .has-divider-solid{
  border-bottom: 1px solid #e8e8e8;
}
.page-wrapper .page-content .row-divider{
  border-bottom: 1px dotted #e8e8e8;
  padding: 10px 0;
}
.page-wrapper .page-content .even-row{
  background: #f5f5f5;
}
.page-wrapper .page-content .read-more.btn{
  margin-bottom: 15px;
  display: inline-block;
}
.page-wrapper .page-content .card-title{
  font-size: 16px;
  font-weight: 300;
  margin-bottom: 0;
}
.page-wrapper .page-content .video-iframe{
  max-width: 100%;
}
.page-wrapper .page-content .album-cover{
  border: 1px solid #e8e8e8;
  margin-bottom: 30px;
}
.page-wrapper .page-content .album-cover:hover{
  box-shadow: 0px 0px 5px 0px #e8e8e8;
}
.page-wrapper .page-content .album-cover > a:hover{
  position: relative;
}
.page-wrapper .page-content .album-cover > a:hover img{
  display: block;
  opacity: 0.9;
}
.page-wrapper .page-content .album-cover .desc{
  padding: 15px;
  position: relative;
}
.page-wrapper .page-content .album-cover .desc:before{
  content: "";
  display: block;
  display: block;
  border-left: 10px solid transparent;
  border-right: 10px solid transparent;
  border-bottom: 10px solid #fff;
  position: absolute;
  top: -10px;
}
.page-wrapper .page-sidebar h3.title{
  margin-top: 0;
  margin-bottom: 15px;
  font-size: 20px;
}
.page-wrapper .page-sidebar .widget{
  margin-bottom: 30px;
  padding-bottom: 15px;
}
.page-wrapper .page-sidebar .widget.has-divider{
  border-bottom: 1px dotted #e8e8e8;
}
.page-wrapper .page-sidebar .widget .iframe{
  height: auto;
  min-height: 200px;
  max-width: 100%;
}
.page-wrapper .page-sidebar .widget .svg-inline--fa{
  margin-right: 5px;
  color: #1ABC9C;
}
.page-wrapper .page-sidebar .widget .svg-inline--fa.fa-phone{
  font-size: 16px;
}
.page-wrapper .page-sidebar .widget .btn .svg-inline--fa{
  color: #fff;
}
.page-wrapper .page-sidebar .widget .nav li a{
  padding: 5px 15px;
  color: #444;
  margin-bottom: 10px;
  border-left: 5px solid transparent;
}
.page-wrapper .page-sidebar .widget .nav li a:hover{
  background: none;
  color: #6091ba;
}
.page-wrapper .page-sidebar .widget .nav li.active a{
  background: none;
  color: #6091ba;
  font-weight: bold;
  border-left: 5px solid #6091ba;
}
.page-wrapper .page-sidebar ul{
  padding-left: 0;
}
.page-wrapper .page-sidebar #flickr-photos li{
  list-style: none;
  float: left;
  display: inline-block;
  margin-bottom: 5px;
  margin-right: 5px;
}
.page-wrapper .page-sidebar #flickr-photos li img{
  max-width: 100%;
  transition: all 0.4s ease-in-out;
}
.page-wrapper .page-sidebar #flickr-photos li img:hover{
  opacity: 0.8;
}
.page-wrapper .page-sidebar .news-item{
  margin-bottom: 15px;
}
.page-wrapper .page-sidebar .news-item img{
  width: 40px;
  height: 40px;
}
.page-wrapper .page-sidebar .news-item .title{
  font-size: 14px;
  margin-top: 0;
}
.page-wrapper .page-sidebar .testimonials-carousel{
  position: relative;
}
.page-wrapper .page-sidebar .testimonials-carousel .svg-inline--fa{
  color: #1ABC9C;
  margin-right: 5px;
  font-size: 18px;
}
.page-wrapper .page-sidebar .testimonials-carousel .carousel .item{
  min-height: 300px;
}
.page-wrapper .page-sidebar .testimonials-carousel .quote{
  padding-left: 15px;
  border-left: 4px solid #f5f5f5;
}
.page-wrapper .page-sidebar .testimonials-carousel .source{
  position: relative;
  min-height: 80px;
}
.page-wrapper .page-sidebar .testimonials-carousel .people{
  margin-top: 30px;
  margin-left: 19px;
}
.page-wrapper .page-sidebar .testimonials-carousel .people .name{
  color: #1ABC9C;
}
.page-wrapper .page-sidebar .testimonials-carousel .people .title{
  color: #999;
}
.page-wrapper .page-sidebar .testimonials-carousel .profile{
  position: absolute;
  right: 0;
  top: 0;
  width: 80px;
  height: 80px;
}
.page-wrapper .page-sidebar .testimonials-carousel .carousel-controls{
  margin-top: 20px;
  text-align: right;
}
.page-wrapper .page-sidebar .testimonials-carousel .carousel-controls a{
  transition: all 0.4s ease-in-out;
  display: inline-block;
  width: 20px;
  height: 20px;
  background: #ddd;
  text-align: center;
}
.page-wrapper
  .page-sidebar
  .testimonials-carousel
  .carousel-controls
  a
  .svg-inline--fa{
  color: #fff;
  text-align: center;
  margin-right: 0;
  font-size: 20px;
}
.page-wrapper
  .page-sidebar
  .testimonials-carousel
  .carousel-controls
  a.next
  .svg-inline--fa{
  margin-left: 2px;
}
.page-wrapper
  .page-sidebar
  .testimonials-carousel
  .carousel-controls
  a.prev
  .svg-inline--fa{
  margin-right: 2px;
}
.page-wrapper .page-sidebar .testimonials-carousel .carousel-controls a:hover{
  background: #1ABC9C;
}
.home-page h1.section-heading{
  font-size: 22px;
  font-weight: 300;
  line-height: 2;
  margin-top: 0;
  color: #2f506c;
}
.home-page h1.section-heading .line{
  border-top: 2px solid #1ABC9C;
  display: inline-block;
  padding: 0 15px;
  padding-top: 5px;
}
.home-page section{
  background: #f5f5f5;
  overflow: hidden;
  margin-bottom: 30px;
}
.home-page .section-content{
  padding: 15px;
  padding-top: 0;
}
.home-page .carousel-controls a{
  transition: all 0.4s ease-in-out;
  display: inline-block;
  background: #ddd;
  width: 20px;
  height: 20px;
  text-align: center;
}
.home-page .carousel-controls a .svg-inline--fa{
  color: #fff;
  margin-right: 0;
  font-size: 18px;
}
.home-page .carousel-controls a.next .svg-inline--fa{
  margin-top: 1px;
  margin-left: 2px;
}
.home-page .carousel-controls a.prev .svg-inline--fa{
  margin-top: 1px;
  margin-right: 2px;
}
.home-page .carousel-controls a:hover{
  background: #1ABC9C;
}
.home-page .promo {
  margin-bottom: 30px;
}
.home-page .promo h1.section-heading{
  margin-top: 0;
  font-size: 24px;
  color: #fff;
}
.home-page .promo p{
  color: #f5f5f5;
}
.home-page .promo .btn-cta{
  font-size: 20px;
  margin-top: 0;
  margin-bottom: 15px;
}
.home-page .news{
  position: relative;
}
.home-page .news .carousel-controls{
  position: absolute;
  right: 10px;
  top: 10px;
}
.home-page .news h2.title{
  font-size: 18px;
  margin-top: 0;
}
.home-page .news h2.title a{
  color: #444;
}
.home-page .news h2.title a:hover{
  color: #365d7e;
}
.home-page .news .news-item{
  padding-left: 115px;
  position: relative;
  margin-bottom: 20px;
}
.home-page .news .thumb{
  position: absolute;
  left: 0;
  top: 0;
}
.home-page .events .section-content{
  min-height: 520px;
}
.home-page .events .event-item{
  position: relative;
  padding-left: 55px;
  border-bottom: 1px solid #e8e8e8;
  padding-bottom: 10px;
  margin-bottom: 15px;
}
.home-page .events .event-item .date-label{
  background: #fff;
  position: absolute;
  left: 0;
}
.home-page .events .event-item h2.title{
  margin-bottom: 20px;
  font-size: 16px;
}
.home-page .events .event-item p{
  margin-bottom: 5px;
}
.home-page .events .event-item .svg-inline--fa{
  margin-right: 5px;
  font-size: 14px;
  min-width: 16px;
  color: #666;
}
.home-page .events .event-item .svg-inline--fa.fa-map-marker {
  font-size: 18px;
}
.home-page .events .read-more{
  margin-top: 15px;
}
.home-page .events .details p{
  color: #666;
}
.home-page .course-finder .course-finder-form{
  margin-bottom: 15px;
}
.home-page .course-finder .keywords{
  padding-left: 0;
}
.home-page .course-finder .keywords input{
  width: 200px;
  margin-right: 5px;
}
.home-page .video{
  position: relative;
}
.home-page .video .carousel-controls{
  position: absolute;
  right: 10px;
  top: 10px;
}
.home-page .video .video-iframe{
  max-width: 100%;
  width: 100%;
  height: 287px;
  margin-bottom: 5px;
}
.home-page .links .svg-inline--fa{
  margin-right: 5px;
}
.home-page .testimonials {
  position: relative;
}
.home-page .testimonials .carousel-controls{
  position: absolute;
  right: 10px;
  top: 10px;
}
.home-page .testimonials .svg-inline--fa{
  color: #1ABC9C;
  margin-right: 5px;
  font-size: 18px;
}
.home-page .testimonials .carousel .item{
  min-height: 298px;
}
.home-page .testimonials .source{
  position: relative;
}
.home-page .testimonials .people{
  margin-top: 10px;
}
.home-page .testimonials .people .name{
  color: #1ABC9C;
}
.home-page .testimonials .people .title{
  color: #999;
}
.home-page .testimonials .profile{
  position: absolute;
  right: 5px;
  top: 5px;
  bottom: 0;
  width: 60px;
  height: 60px;
  border-radius: 50%;
  width: 100px;
  height: 100px;
}
.home-page .awards{
  background: #fff;
}
.home-page .awards .logos{
  margin: 0;
  padding: 0;
}
.home-page .awards .logos li{
  list-style: none;
  margin-right: 0;
  text-align: center;
}
.home-page .awards .logos li img{
  opacity: 0.6;
  margin: 0 auto;
}
.home-page .awards .logos li img:hover{
  opacity: 1;
}
.home-page .awards .carousel-control{
  background: none;
  width: auto;
  top: 20px;
  text-shadow: none;
  -webkit-opacity: 1;
  -moz-opacity: 1;
  opacity: 1;
  filter: alpha(opacity=100);
  transition: all 0.4s ease-in-out;
}
.home-page .awards .carousel-control .svg-inline--fa{
  color: #e8e8e8;
  font-weight: bold;
}
.home-page .awards .carousel-control:hover .svg-inline--fa{
  color: #999;
}
.flexslider{
  overflow: hidden;
}
.flex-direction-nav a{
  width: 36px;
  height: 36px;
  border-radius: 50%;
  padding: 10px;
  padding-top: 6px;
  color: #fff;
  background: rgba(0, 0, 0, 0.8);
  text-shadow: none;
  text-align: center;
}
.flex-direction-nav a:before{
  text-shadow: none;
  color: #fff;
  font-size: 18px;
  margin-top: 0px;
}
.courses-wrapper .tab-content{
  font-size: 12px;
}
.courses-wrapper .tab-content .item{
  margin-top: 15px;
}
.courses-wrapper .tab-content img{
  margin-bottom: 10px;
}
.courses-wrapper .course-finder{
  margin-bottom: 30px;
}
.courses-wrapper .course-finder .keywords input{
  width: 260px;
}
.courses-wrapper .course-list-header{
  font-size: 15px;
  margin-bottom: 15px;
}
.courses-wrapper .course-list-header .summary{
  padding-top: 10px;
}
.courses-wrapper .course-list-header .control-label{
  font-size: 12px;
  font-weight: normal;
  display: inline-block;
  margin-right: 10px;
  line-height: 2;
}
.courses-wrapper .course-list-header .sort{
  padding-top: 5px;
}
.courses-wrapper .course-list-header .sort-options{
  width: auto;
  height: 25px !important;
  font-size: 12px;
}
.courses-wrapper .course-item{
  font-size: 12px;
}
.courses-wrapper .course-item .col-meta{
  color: #777;
}
.events-wrapper .events-item .date-label{
  background: #f5f5f5;
}
.events-wrapper .events-item .details .time{
  margin-right: 10px;
}
.events-wrapper .events-item .details .svg-inline--fa{
  margin-right: 5px;
}
.contact-form .required{
  color: #e14b39;
  display: inline-block;
  font-weight: normal;
  padding-left: 2px;
}
.contact-form label{
  font-weight: 700;
}
.contact-form .form-control{
  font-size: 14px;
}
.gmap-wrapper{
  border: 1px solid #e8e8e8;
  position: relative;
  padding-bottom: 30%;
  height: 0;
  overflow: hidden;
}
.gmap-wrapper iframe{
  position: absolute;
  top: 0;
  left: 0;
  width: 100% !important;
  height: 100% !important;
}
@media (max-width: 767.98px){
  .wrapper{
    min-height: inherit;
    margin-bottom: 0;
  }
  .wrapper:after{
    content: none;
  }
  .footer{
    height: auto;
  }
  .pull-right,
  .pull-left{
    float: none !important;
  }
  .logo{
    text-align: center;
  }
  .header .contact p{
    text-align: center;
    margin-right: 0;
    margin-bottom: 5px;
    float: none;
  }
  .header .menu-top{
    text-align: center;
    margin-top: 10px;
  }
  .header .menu-top li{
    float: none;
    display: inline-block;
  }
  .header br{
    display: none;
  }
  .header .social-icons{
    text-align: center;
    margin: 0 auto;
  }
  .header .social-icons li{
    float: none;
    display: inline-block;
  }
  .main-nav .navbar-collapse{
    border-top: 0;
    box-shadow: 0;
  }
  .main-nav .nav .nav-item .nav-link.active:before{
    display: none;
  }
  .navbar-nav{
    margin-top: 0;
  }
  .header .search-form{
    text-align: center;
  }
  .header .search-form .form-group{
    display: inline-block;
  }
  .header .search-form .form-control{
    width: 210px;
  }
  .main-nav .nav .nav-item.active > a:before{
    content: none;
  }
  .main-nav .nav .nav-item .dropdown-submenu > .dropdown-menu{
    position: static;
    left: auto;
    margin-left: 0;
  }
  .main-nav .nav .nav-item .dropdown-submenu .dropdown-menu a{
    padding-left: 30px;
  }
  .main-nav .nav .nav-item .dropdown-submenu .dropdown-menu a:hover{
    padding-left: 34px;
  }
  .main-nav
    .nav
    .nav-item
    .dropdown-submenu
    .dropdown-menu
    .dropdown-submenu
    .dropdown-menu
    a{
    padding-left: 45px;
  }
  .main-nav
    .nav
    .nav-item
    .dropdown-submenu
    .dropdown-menu
    .dropdown-submenu
    .dropdown-menu
    a:hover{
    padding-left: 49px;
  }
  .flexslider{
    margin-bottom: 15px;
  }
  .flex-direction-nav a{
    margin-top: -50px;
  }
  .flexslider .slides .flex-caption{
    position: static;
    display: block;
  }
  .flexslider .slides .flex-caption br{
    display: none;
  }
  .flexslider .slides .flex-caption .main{
    font-size: 15px;
    display: block;
    margin-bottom: 0;
  }
  .flexslider .slides .flex-caption .secondary{
    display: block;
    font-size: 12px;
  }
  .flexslider .flex-control-nav{
    display: none;
  }
  .home-page .news .thumb{
    width: 60px;
    height: 60px;
  }
  .home-page .news .news-item{
    padding-left: 75px;
  }
  .home-page .course-finder .keywords{
    padding-left: 5px;
    margin-top: 10px;
    width: 200px;
  }
  .home-page .course-finder .keywords input{
    width: 200px;
  }
  .home-page .video .video-iframe{
    height: auto;
  }
  .home-page .testimonials .carousel .item{
    min-height: inherit;
  }
  .home-page .events .section-content{
    min-height: inherit;
  }
  .home-page .awards .carousel-control{
    top: 50px;
  }
  .footer .footer-content .subscribe-form .form-control{
    width: 140px;
  }
  .footer #tweet .tweets-list-container{
    max-width: 100%;
  }
  .footer .bottom-bar .social li{
    float: left;
  }
  .footer-col-inner{
    margin-bottom: 30px;
  }
  .footer #tweet{
    min-height: inherit;
  }
  .footer .footer-content .footer-col .fa-twitter{
    text-align: center;
    margin-bottom: 10px;
  }
  .page-wrapper .page-heading h1.heading-title{
    float: none;
    text-align: center;
    display: block;
  }
  .page-wrapper .breadcrumbs{
    text-align: center;
    display: block;
  }
  .page-wrapper .breadcrumbs ul{
    padding-top: 0;
    padding-left: 0;
    margin: 0 auto;
  }
  .page-wrapper .breadcrumbs ul li{
    float: none;
    display: inline-block;
  }
  .page-wrapper .breadcrumbs ul li.current{
    max-width: inherit;
    overflow: visible;
  }
  .home-page .course-finder .keywords input{
    float: left !important;
  }
}
@media (min-width: 768px) {
  .wrapper{
    min-height: inherit;
    margin-bottom: 0;
  }
  .wrapper:after{
    content: none;
  }
  .header .top-bar .search-form{
    text-align: right;
  }
  .footer{
    height: auto;
  }
  .footer .bottom-bar .social li{
    float: left;
  }
  .footer-col-inner{
    margin-bottom: 15px;
  }
  .home-page .testimonials .carousel .item{
    min-height: inherit;
  }
  .home-page .events .section-content{
    min-height: inherit;
  }
  .footer #tweet{
    min-height: inherit;
  }
  .page-wrapper .album-cover{
    min-height: 360px;
  }
  .home-page .course-finder .keywords input{
    width: 180px;
  }
}
@media (min-width: 992px){
  .home-page .testimonials .carousel .item{
    min-height: 298px;
  }
  .home-page .events .section-content{
    min-height: 520px;
  }
  .home-page .video .video-iframe{
    height: 287px;
  }
  .home-page .promo .btn-cta{
    margin-top: 30px;
  }
  .home-page .course-finder .keywords input{
    width: 190px;
  }
  .footer .bottom-bar .social li{
    float: right;
  }
  .footer #tweet{
    min-height: 100px;
  }
  .page-wrapper .album-cover{
    min-height: 360px;
  }
  html,
  body{
    height: 100%;
  }
  body{
    font-size: 15px;
  }
  .wrapper{
    min-height: 100%;
    margin-bottom: -344px;
  }
  .wrapper:after{
    content: "";
    display: block;
    height: 344px;
  }
  .footer{
    height: 344px;
  }
}
@media (min-width: 1200px){
  .home-page .course-finder .keywords input{
    width: 250px;
  }
}
.config-wrapper{
  position: absolute;
  top: 100px;
  right: 0;
}
.config-wrapper-inner{
  position: relative;
}
.config-trigger:hover{
  background: #000;
}
.config-trigger .svg-inline--fa{
  font-size: 20px;
  margin-top: 8px;
  display: block;
  color: #fff;
}
.config-panel{
  display: none;
  background: #444;
  color: #fff;
  padding: 15px;
  border-top-right-radius: 0;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 4px;
  border-top-left-radius: 0;
}
.config-panel p{
  margin: 0;
  padding: 0;
  margin-bottom: 15px;
  color: #fff;
}
.config-panel ul{
  margin-bottom: 0;
}
.config-panel li a{
  display: block;
  width: 20px;
  height: 20px;
  border: 2px solid transparent;
}
.config-panel li a:hover{
  opacity: 0.9;
  border: 2px solid rgba(255, 255, 255, 0.8);
}
.config-panel li.active a{
  border: 2px solid #fff;
}
.config-panel li.default a{
  background: #6091ba;
}
.config-panel li.green a{
  background: #57a89a;
}
.config-panel li.purple a{
  background: #6f7a9f;
}
.config-panel li.red a{
  background: #a85770;
}
.config-panel .close{
  position: absolute;
  right: 5px;
  top: 5px;
  color: #fff;
}
.config-panel .close .svg-inline--fa{
  color: #fff;
  font-size: 18px;
}
.carousel-inner img {
    width: 100%;
    height: 100%;
  }
        </style>
    </head>
    <body  class="home-page">
       

           
    <div class="wrapper">
        <!-- HEADER --> 
        <header class="header">  
            <div class="top-bar">
                <div class="container">     
	                <div class="row">  
	                    <ul class="social-icons col-md-6 col-12 d-none d-md-block">
	                        <li><a href="#" ><i class="fab fa-twitter"></i></a></li>
	                        <li><a href="#" ><i class="fab fa-facebook-f"></i></a></li>
	                        <li><a href="#" ><i class="fab fa-youtube"></i></a></li>
	                        <li><a href="#" ><i class="fab fa-linkedin-in"></i></a></li>
	                        <li><a href="#" ><i class="fab fa-google-plus-g"></i></a></li>         
	                        <li class="row-end"><a href="#" ><i class="fas fa-rss"></i></a></li>             
	                    </ul>
                        <!--social-icons-->
	                    <form class="col-md-6 col-12 search-form" role="search">
	                        <div class="form-group">
	                            <input type="text" class="form-control counded-5 rounded-pill" placeholder="Search Here...">
	                        </div>
	                        <button type="submit" class="btn btn-theme rounded-lg">Search</button>
	                        <button type="submit" class="btn btn-theme rounded-lg">     <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a></button>


	                    </form>    
	                </div>    
                </div>      
            </div>
            <!--to-bar-->
            <div class="header-main container">
	            <div class="row">
	                <h1 class="logo col-md-4 col-12">
	                     Smart Learning 
	                </h1>           
	                <div class="info col-md-8 col-12">
	                    <ul class="menu-top float-right d-none d-md-block">
	                        <li class="divider"><a href="index.html">Home</a></li>
	                        <li class="divider"><a href="faq.html">FAQ</a></li>
	                        <li><a href="contact.html">Contact</a></li>
	                    </ul>
                        <!--menu-top-->
	                    <br />
	                    <div class="contact float-right mt-4">
	                        <p class="phone"><i class="fas fa-phone"></i>Call Us +923439281821</p> 
	                        <p class="email"><i class="fas fa-envelope"></i><a href="contact.html">example@website.com</a></p>
	                    </div>
	                </div>
	            </div>
            </div>
        </header>
        
        <!-- NAV -->
        <div class="main-nav-wrapper">
            <div class="container d-flex">
	            <nav class="main-nav navbar navbar-expand-md" role="navigation">    
	                <!-- <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbar-collapse"> -->
	                    <span class="sr-only"></span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                </button>
	                          
	                <div class="navbar-collapse collapse" id="navbar-collapse">
	                    <ul class="nav navbar-nav">
	                        <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
	                        <li class="nav-item dropdown">
	                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown-1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Departments<i class="fas fa-angle-down"></i></a>
	                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
	                                <a class="dropdown-item" href="courses.html">All Departments</a>
	                                <a class="dropdown-item" href="cse.html">CSE</a>
	                                <a class="dropdown-item" href="eee.html">EEE</a>                
	                                <a class="dropdown-item" href="civil.html">Civil</a>                
	                                <a class="dropdown-item" href="textile.html">Textile</a>                                
	                            </div>
                                <!--dropdown-menu-->
	                        </li>
	                        <li class="nav-item"><a class="nav-link" href="news.html">News</a></li>
	                        <li class="nav-item"><a class="nav-link" href="events.html">Events</a></li>
	                        <li class="nav-item dropdown">
	                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false" href="#">Pages <i class="fas fa-angle-down"></i></a>
	                            <div class="dropdown-menu">
	                                <a class="dropdown-item" href="about.html">About</a>
	                                <a class="dropdown-item" href="team.html">Leadership Team</a>
	                                <a class="dropdown-item" href="jobs.html">Jobs</a>
                                    <a class="dropdown-item" href="faq.html">FAQ</a>
	                                <a class="dropdown-item" href="privacy.html">Privacy Policy</a> 
	                                <a class="dropdown-item" href="terms-and-conditions.html">Terms & Conditions</a> 
                                    
	                            </div>
	                        </li>
	                        
	                        <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
	                    </ul>
	                </div>
		        </nav>
                <!-- <marquee>"<span class="text-danger"> Welcome To </span>"Smart Learning System</marquee> -->
	        </div>
        </div>
        
        <!-- slider -->
        
  <!-- CONTENT --> 
  <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-bs-target="#carouselExample" data-bs-slide-to="0" class="active"></li>
    <li data-bs-target="#carouselExample" data-bs-slide-to="1"></li>
    <li data-bs-target="#carouselExample" data-bs-slide-to="2"></li>
  </ol>

  <!-- Slides -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{ asset('backend/images/Sliders/slide-1.jpg') }}" alt="" />
    </div>
    <div class="carousel-item">
      <!-- Add additional slides here -->
      <img src="{{ asset('backend/images/Sliders/slide-2.jpg') }}" alt="" />
    </div>
    <div class="carousel-item">
      <!-- Add additional slides here -->
      <img src="{{ asset('backend/images/Sliders/slide-3.jpg') }}" alt="" />
    </div>
  </div>

  <!-- Controls -->
  <a class="carousel-control-prev" href="#carouselExample" role="button" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExample" role="button" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </a>
</div>


        







        <br>
            <!--flexslider-->
            <section class="promo box box-dark rounded">     
	            <div class="row">  
	                <div class="col-lg-9 col-12">
	                <h1 class="section-heading">Admission</h1>
	                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed bibendum orci eget nulla mattis, quis viverra tellus porta. Donec vitae neque ut velit eleifend commodo. Maecenas turpis odio, placerat eu lorem ut, suscipit commodo augue.  </p>   
	                </div>  
	                <div class="col-lg-3 col-12">
	                    <a class="btn btn-danger btn-cta rounded" href="all-pages/registration.html"><i class="fas fa-play-circle"></i>Apply Now</a>  
	                </div>
	            </div>
                <!--row-->
            </section>
            <!--promo-->
            <section class="news rounded">
                <h1 class="section-heading text-highlight fw-bold"><span class="line">Latest News</span></h1>     
                <div class="carousel-controls">
                    <a class="prev rounded-pill" href="#news-carousel" data-slide="prev"><i class="fas fa-caret-left"></i></a>
                    <a class="next rounded-pill" href="#news-carousel" data-slide="next"><i class="fas fa-caret-right"></i></a>
                </div>
                <!--carousel-controls--> 
                <div class="section-content clearfix">
                    <div id="news-carousel" class="news-carousel carousel slide">
                        <div class="carousel-inner">
                            <div class="item carousel-item active"> 
	                            <div class="row">
	                                <div class="col-lg-4 col-12 news-item">
	                                    <h2 class="title"><a href="news.html">Award Giving Ceremony</a></h2>
	                                    <p>Suspendisse purus felis, porttitor quis sollicitudin sit amet, elementum et tortor. Praesent lacinia magna in malesuada vestibulum. Pellentesque urna libero.</p>
	                                    <a class="read-more" href="news-single.html">Read more<i class="fas fa-chevron-right"></i></a>                
	                                </div>
	                                <div class="col-lg-4 col-12 news-item">
	                                    <h2 class="title"><a href="news.html">RAG Day (Batch 2019-23)</a></h2>
	                                    <p>Nam feugiat erat vel neque mollis, non vulputate erat aliquet. Maecenas ac leo porttitor, semper risus condimentum, cursus elit. Vivamus vitae libero tellus.</p>
	                                    <a class="read-more" href="news.html">Read more<i class="fas fa-chevron-right"></i></a>
	                                </div>
	                                <div class="col-lg-4 col-12 news-item">
	                                    <h2 class="title"><a href="news.html">Tribute to Muhammd Nawaz</a></h2>
	                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam bibendum mauris eget sapien consectetur pellentesque. Proin elementum tristique euismod. </p>
	                                    <a class="read-more" href="news.html">Read more<i class="fas fa-chevron-right"></i></a>
	                                </div>
	                            </div>
                            </div>
                            <!--item-->
                            <div class="item carousel-item"> 
	                            <div class="row">
	                                <div class="col-lg-4 col-12 news-item">
	                                    <h2 class="title"><a href="news.html">Principal M. A. XYZ</a></h2>
	                                    <p>Suspendisse purus felis, porttitor quis sollicitudin sit amet, elementum et tortor. Praesent lacinia magna in malesuada vestibulum. Pellentesque urna libero.</p>
	                                    <a class="read-more" href="news.html">Read more<i class="fas fa-chevron-right"></i></a>                
	                                </div>
	                                <div class="col-lg-4 col-12 news-item">
	                                    <h2 class="title"><a href="news.html">Conference</a></h2>
	                                    <p>Nam feugiat erat vel neque mollis, non vulputate erat aliquet. Maecenas ac leo porttitor, semper risus condimentum, cursus elit. Vivamus vitae libero tellus.</p>
	                                    <a class="read-more" href="news.html">Read more<i class="fas fa-chevron-right"></i></a>
	                                </div>
	                                <div class="col-lg-4 col-12 news-item">
	                                    <h2 class="title"><a href="news.html">Student Practical Training</a></h2>
	                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam bibendum mauris eget sapien consectetur pellentesque. Proin elementum tristique euismod. </p>
	                                    <a class="read-more" href="news.html">Read more<i class="fas fa-chevron-right"></i></a>
	                                </div>
                                    <!--news-item-->
	                            </div>
                            </div>
                        </div>
                    </div>  
                </div>     
            </section>
            <div class="row cols-wrapper">
                <div class="col-lg-3 col-12">
                    <section class="events rounded shadow">
                        <h1 class="section-heading text-highlight"><span class="line">Events</span></h1>
                        <div class="section-content">
                            <div class="event-item">
                                <p class="date-label">
                                    <span class="month">FEB</span>
                                    <span class="date-number">18</span>
                                </p>
                                <div class="details">
                                    <h2 class="title">Open Day</h2>
                                    <p class="time"><i class="far fa-clock"></i>10:00am - 18:00pm</p>
                                    <p class="location"><i class="fas fa-map-marker-alt"></i>GPGC Mansehar</p>                            
                                </div>
                            </div>  
                            <div class="event-item">
                                <p class="date-label">
                                    <span class="month">SEP</span>
                                    <span class="date-number">06</span>
                                </p>
                                <div class="details">
                                    <h2 class="title">E-learning at SEU</h2>
                                    <p class="time"><i class="far fa-clock"></i>10:00am - 16:00pm</p>
                                    <p class="location"><i class="fas fa-map-marker-alt"></i>GPGC Mansehar Learning Center</p>                            
                                </div>
                            </div>
                            <div class="event-item">
                                <p class="date-label">
                                    <span class="month">JUN</span>
                                    <span class="date-number">23</span>
                                </p>
                                <div class="details">
                                    <h2 class="title">Career Fair</h2>
                                    <p class="time"><i class="far fa-clock"></i>09:45am - 16:00pm</p>
                                    <p class="location"><i class="fas fa-map-marker-alt"></i>GPGC Mansehar Library</p>                            
                                </div>
                            </div>
                            <div class="event-item">
                                <p class="date-label">
                                    <span class="month">May</span>
                                    <span class="date-number">17</span>
                                </p>
                                <div class="details">
                                    <h2 class="title">Science Seminar</h2>
                                    <p class="time"><i class="far fa-clock"></i>14:00pm - 18:00pm</p>
                                    <p class="location"><i class="fas fa-map-marker-alt"></i>GPGC Mansehar Library</p>                            
                                </div>
                            </div>
                            <a class="read-more" href="events.html">All events<i class="fas fa-chevron-right"></i></a>
                        </div>
                    </section>
                </div>
                <div class="col-lg-6 col-12">
                    <section class="course-finder rounded shadow">
                        <h1 class="section-heading text-highlight"><span class="line">Find Content</span></h1>
                        <div class="section-content">
                            <form class="course-finder-form" action="#" method="get">
                                <div class="form-row">
                                    <div class="col-md-5 col-12 subject">
                                        <select class="form-control subject rounded">
                                            <option>content-1</option>
                                            <option>content-2</option>
                                            <option>contant-3</option>
                                            <option>contant-4</option>
                                            <option>contant-5</option>
                                            <option>contant-6</option>
                                            <option>contant-7</option>
                                            <option>contant-8</option>
                                            <option>contant-9</option>
                                            <option>contant-10</option>
                                        </select>
                                    </div> 
                                    <div class="col-md-7 col-12 keywords">
                                        <input class="form-control float-left rounded-lg" type="text" placeholder="Search keywords" />
                                        <button type="submit" class="btn btn-theme rounded-lg course-btn"><i class="fas fa-search"></i></button>
                                    </div> 
                                </div>                     
                            </form>
                            <a class="read-more" href="courses.html">View all our courses<i class="fas fa-chevron-right"></i></a>
                        </div>
                    </section>
                    <section class="video rounded-lg">
                        <h1 class="section-heading text-highlight"><span class="line">Documentary</span></h1>
                        <div class="carousel-controls">
                            <a class="prev rounded-pill" href="#videos-carousel" data-slide="prev"><i class="fas fa-caret-left"></i></a>
                            <a class="next rounded-pill" href="#videos-carousel" data-slide="next"><i class="fas fa-caret-right"></i></a>
                        </div>
                        <div class="section-content">    
                           <div id="videos-carousel" class="videos-carousel carousel slide">
                                <div class="carousel-inner">
                                    <div class="carousel-item item active">    
	                                    <div class="embed-responsive embed-responsive-16by9 mb-2">        
	                                        <!-- <iframe class="rounded-lg" width="560" height="315" src="<iframe width="560" height="315" src="https://www.youtube.com/embed/eHpvxY6bCC4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe> -->
                                            <iframe width="560" height="315" src="https://www.youtube.com/embed/eHpvxY6bCC4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                          </div>
                                    </div>
                                    <div class="carousel-item item">            
                                        <div class="embed-responsive embed-responsive-16by9 mb-2">        
	                                        <iframe class="embed-responsive-item" src="http://www.youtube.com/embed/RcGyVTAoXEU?rel=0&amp;wmode=transparent" frameborder="0" allowfullscreen=""></iframe>
	                                    </div>
                                    </div>
                                    <div class="carousel-item item">
                                        <div class="embed-responsive embed-responsive-16by9 mb-2">        
	                                        <iframe class="embed-responsive-item" src="http://www.youtube.com/embed/Ks-_Mh1QhMc?rel=0&amp;wmode=transparent" frameborder="0" allowfullscreen=""></iframe>
	                                    </div>
                                    </div>
                                </div>
                           </div>                            
                            <p class="description">Here Is Details Description of Course.</p>
                        </div>
                    </section>
                </div>
                <div class="col-lg-3 col-12">
                    <section class="links rounded shadow">
                        <h1 class="section-heading text-highlight"><span class="line">Quick Links</span></h1>
                        <div class="section-content">
                            <p><a href="#"><i class="fas fa-caret-right"></i>E-learning Portal</a></p>
                            <p><a href="#"><i class="fas fa-caret-right"></i>Gallery</a></p>
                            <!-- <p><a href="#"><i class="fas fa-caret-right"></i>Job Vacancies</a></p> -->
                            <p><a href="#"><i class="fas fa-caret-right"></i>Contact</a></p>
                        </div>
                    </section>
                    <section class="testimonials">
                        <h1 class="section-heading text-highlight"><span class="line"> Testimonials</span></h1>
                        <div class="carousel-controls">
                            <a class="prev rounded-pill" href="#testimonials-carousel" data-slide="prev"><i class="fas fa-caret-left"></i></a>
                            <a class="next rounded-pill" href="#testimonials-carousel" data-slide="next"><i class="fas fa-caret-right"></i></a>
                        </div>
                        <div class="section-content">
                            <div id="testimonials-carousel" class="testimonials-carousel carousel slide">
                                <div class="carousel-inner">
                                    <div class="carousel-item item active">
                                        <blockquote class="quote">                                  
                                            <p><i class="fas fa-quote-left"></i>I’m very happy interdum eget ipsum. Nunc pulvinar ut nulla eget sollicitudin. In hac habitasse platea dictumst. Integer mattis varius ipsum, posuere posuere est porta vel. Integer metus ligula, blandit ut fermentum a, rhoncus in ligula. Duis luctus.</p>
                                        </blockquote>                
                                        <div class="source">
                                            <p class="people"><span class="name">Bilal</span></p>
                                        </div>                               
                                    </div>
                                    <div class="carousel-item item">
                                        <blockquote class="quote">
                                            <p><i class="fas fa-quote-left"></i>
                                            I'm very pleased commodo gravida ultrices. Sed massa leo, aliquet non velit eu, volutpat vulputate odio. Interdum et malesuada fames ac ante ipsum primis in faucibus. Suspendisse porttitor metus eros, ut fringilla nulla auctor a.</p>
                                        </blockquote>
                                        <div class="source">
                                            <p class="people"><span class="name">Hassan</span></p>
                                        </div>                 
                                    </div>
                                    <div class="carousel-item item">
                                        <blockquote class="quote">
                                            <p><i class="fas fa-quote-left"></i>
                                            I'm delighted commodo gravida ultrices. Sed massa leo, aliquet non velit eu, volutpat vulputate odio. Interdum et malesuada fames ac ante ipsum primis in faucibus. Suspendisse porttitor metus eros, ut fringilla nulla auctor a.</p>
                                        </blockquote>
                                        <div class="source">
                                            <p class="people"><span class="name">Iqbal Hossain</span></p>
                                        </div>                 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>

            
                    
    
    <!-- FOOTER --> 
    <footer class="footer">
        <div class="footer-content">
            <div class="container">
                <div class="row">
                <div class="footer-col col-lg-3 col-md-4 col-12 about">
                    <div class="footer-col-inner">
                        <h3>About</h3>
                        <ul>
                            <li><a href="about.html"><i class="fas fa-caret-right"></i>About us</a></li>
                            <li><a href="contact.html"><i class="fas fa-caret-right"></i>Contact us</a></li>
                            <li><a href="privacy.html"><i class="fas fa-caret-right"></i>Privacy policy</a></li>
                            <li><a href="terms-and-conditions.html"><i class="fas fa-caret-right"></i>Terms & Conditions</a></li>
                        </ul>
                    </div>
                </div>
                <div class="footer-col col-lg-6 col-md-8 col-12 newsletter">
                    <div class="footer-col-inner">
                        <h3>Join our mailing list</h3>
                        <p>Subscribe Us</p>
                        <form class="subscribe-form">
                            <div class="form-group">
                                <input type="email" class="form-control rounded-pill" placeholder="Enter your email" />
                            </div>
                            <input class="btn btn-theme btn-subscribe rounded" type="submit" value="Subscribe">
                        </form>
                    </div>
                </div> 
                <div class="footer-col col-lg-3 col-12 contact">
                    <div class="footer-col-inner">
                        <h3>Contact us</h3>
                        <div class="row">
                            <p class="adr clearfix col-lg-12 col-md-4 col-12">
                                <i class="fas fa-map-marker-alt float-left"></i>        
                                <span class="adr-group float-left">       
                                    <span class="street-address">GPGC </span><br>
                                    <span class="region">Mansehra</span><br>
                                    
                                </span>
                            </p>
                            <p class="tel col-lg-12 col-md-4 col-12"><i class="fas fa-phone"></i>+923435281821</p>
                            <p class="email col-lg-12 col-md-4 col-12"><i class="fas fa-envelope"></i><a href="#">example@website.com</a></p>  
                        </div> 
                    </div>            
                </div>   
                </div>   
            </div>        
        </div>
        <div class="bottom-bar">
            <div class="container">
                <div class="row">
                    <small class="copyright col-lg-6 col-12">All Copyright @ <a href="#">GPGC Mansehra</a></small>
                </div>
            </div>
        </div>
    </footer>
 
    <!-- Javascript -->    
    <script type="text/javascript" src="assets/plugins/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="assets/plugins/popper.min.js"></script> 
    <script type="text/javascript" src="assets/plugins/bootstrap/js/bootstrap.min.js"></script> 
    <script type="text/javascript" src="assets/plugins/back-to-top.js"></script>
    <script type="text/javascript" src="assets/plugins/flexslider/jquery.flexslider-min.js"></script>
    <script type="text/javascript" src="assets/plugins/jflickrfeed/jflickrfeed.min.js"></script> 
    <script type="text/javascript" src="assets/js/main.js"></script>
     
           
 


             
    </body>
</html>
