<style>
.dropbtn {
    background-color: #3498DB;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.dropbtn1 {
    background-color: #3498DB;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.dropbtn2 {
    background-color: #3498DB;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.dropbtn3 {
    background-color: #3498DB;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.dropbtn4 {
    background-color: #3498DB;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
    background-color: #2980B9;
}

.dropbtn1:hover, .dropbtn1:focus {
    background-color: #2980B9;
}

.dropbtn2:hover, .dropbtn2:focus {
    background-color: #2980B9;
}

.dropbtn3:hover, .dropbtn3:focus {
    background-color: #2980B9;
}

.dropbtn4:hover, .dropbtn4:focus {
    background-color: #2980B9;
}
.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown1 {
    position: relative;
    display: inline-block;
}

.dropdown2 {
    position: relative;
    display: inline-block;
}

.dropdown3 {
    position: relative;
    display: inline-block;
}

.dropdown4 {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    overflow: auto;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content1 {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    overflow: auto;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content2 {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    overflow: auto;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content3 {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    overflow: auto;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content4 {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    overflow: auto;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content1 a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content2 a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content3 a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content4 a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown a:hover {background-color: #ddd;}
.dropdown1 a:hover {background-color: #ddd;}
.dropdown2 a:hover {background-color: #ddd;}
.dropdown3 a:hover {background-color: #ddd;}
.dropdown4 a:hover {background-color: #ddd;}

.show {display: block;}
</style>
</head>
<body>

<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}
function myFunction1() {
    document.getElementById("myDropdown1").classList.toggle("show");
}
function myFunction2() {
    document.getElementById("myDropdown2").classList.toggle("show");
}
function myFunction3() {
    document.getElementById("myDropdown3").classList.toggle("show");
}
function myFunction4() {
    document.getElementById("myDropdown4").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
  if (!event.target.matches('.dropbtn1')) {

    var dropdowns1 = document.getElementsByClassName("dropdown-content1");
    var i;
    for (i = 0; i < dropdowns1.length; i++) {
      var openDropdown = dropdowns1[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
  if (!event.target.matches('.dropbtn2')) {

    var dropdowns2 = document.getElementsByClassName("dropdown-content2");
    var i;
    for (i = 0; i < dropdowns2.length; i++) {
      var openDropdown = dropdowns2[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
  if (!event.target.matches('.dropbtn3')) 
  {

    var dropdowns3 = document.getElementsByClassName("dropdown-content3");
    var i;
    for (i = 0; i < dropdowns3.length; i++)
     {
      var openDropdown = dropdowns3[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
 
  if (!event.target.matches('.dropbtn3')) 
  {

    var dropdowns3 = document.getElementsByClassName("dropdown-content3");
    var i;
    for (i = 0; i < dropdowns3.length; i++)
     {
      var openDropdown = dropdowns3[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
 
}
</script>

<table width="100%" border="0">
  <tr>
    <td width="80%"><div align="center"><img src="/fcu/images/titlelogo.jpg" width="800" height="157" /></div></td>
    <td width="20%"><?php
    if (isset($_SESSION['usr']) && isset($_SESSION['username']) )
    {
      echo "會員ID:".$_SESSION['usr']."<br>" ;
      echo "會員名稱:".$_SESSION['username']."<br>" ;
    }   // end of if (isset($_SESSION['usr']) && isset($_SESSION['username']) )
    else
    {
      echo "會員未登錄<br>" ;
      echo "<a href='/fcu/login.php'>登入網站</a>" ;
    }   // end of if (isset($_SESSION['usr']) && isset($_SESSION['username']) )
    if (!isset($_SESSION['itemamount']) )
    {
      echo "購物車:未進行消費<br>" ;
    }   // end of if (!isset($_SESSION['itemamount']) )
    else
    {

      if ($_SESSION['itemamount'] >0)
      {
        echo "購物車項目:("."<a href='/fcu/meatball/viewcart.php'>".$_SESSION['itemamount']."</a>".")"."<a href='/fcu/meatball/viewcart.php'>檢視購物車</a>"."<br>" ;
        echo "<a href='/fcu/meatball/checkout2.php'>結帳</a>" ;
      } // end of if ($_SESSION['itemamount'] >0)
      else
      {
        echo "採購中<br>" ;
      } // end of if ($_SESSION['itemamount'] >0)

    }  // end of if (!isset($_SESSION['itemamount']) )

    ?></div>
    </td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
 	<td width="70">
  			<a href="http://140.134.25.43:8088/fcu/index.php">Home</a>
	</td>
 	<td width="200">
			<div class="dropdown">
			<button onClick="myFunction()" class="dropbtn">System</button>
				  <div id="myDropdown" class="dropdown-content">
					<a href="/site/sitelist.php">Site List</a>
					<a href="/map.php">Map View</a>
					<a href="/index_cwb2.php">Open Data @CWB.TW</a>
			 	 </div>
			</div>
	</td>
 	<td width="200">
			<div class="dropdown">
			<button onClick="myFunction1()" class="dropbtn1">營運項目</button>
				  <div id="myDropdown1" class="dropdown-content1">
					<a href="/fcu/ledsite/godlist.php">點燈</a>				  
					<a href="/fcu/meatball/balllist.php">選擇肉圓</a>
					<a href="/fcu/meatball/checkcart.php">檢視購物車</a>
					<a href="/fcu/meatball/checkout2.php">結帳</a>
			 	 </div>
			</div>
	</td>
 	<td width="200">
			<div class="dropdown">
			<button onClick="myFunction2()" class="dropbtn2">基本資料設定</button>
				  <div id="myDropdown2" class="dropdown-content2">
					<a href="/fcu/movie/movielist.php">電影編修</a>
			 	 </div>
			</div>
	</td>
 	<td width="200">
			<div class="dropdown">
			<button onClick="myFunction3()" class="dropbtn3">系統設定</button>
				  <div id="myDropdown3" class="dropdown-content3">
					<a href="/fcu/ledsite/ledlist.php">新燈設定</a>
					<a href="/site/sitelist.php">Power Switch</a>
					<a href="/site/sitelist.php">Light</a>
			 	 </div>
			</div>
	</td>
  <td width="200">
			<div class="dropdown">
			<button onClick="myFunction4()" class="dropbtn4">網站管理</button>
				  <div id="myDropdown4" class="dropdown-content4">
					<a href="/fcu/login.php">Login Web</a>
					<a href="/fcu/member/memberadd.php">Register New User</a>
					<a href="/fcu/member/memberlist.php">Web User List</a>
					<a href="/fcu/logout.php">Logout</a>
			 	 </div>
			</div>
	</td>  
  </tr>
</table>
