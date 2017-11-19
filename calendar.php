<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <Title> Calendar page </Title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="main.css">
</head>
    
<body>
    <!-- Menu and links -->
    <div class="Menu">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a  class="active" href="calendar.php">Calendar</a></li>
            <li><a href="pancakes.php">Pancakes</a></li>
            <li><a href="meatballs.php">Meatballs</a></li>
            <?php 
                    if($_SESSION['uname']){
                        echo'<li><a href="logout.php">Log out</a></li>';
                    }
                    else{
                        echo'<li><a href="login.php">Login</a></li>';
                    }
            ?>
        </ul>
    </div>        

    <div class="OuterBoxCalendar">
        <div class="InnerBoxCalendar">
            <h1> Calendar </h1>
        </div>
    </div>
    
    <div class = "Month">
        <div id = "text">
            <p>November 2017</p>
        </div>
    </div>
    
    <div class = "calendar"> 
        
        <div id = "monday">
            <p>Monday</p>
        </div>
        
        <div id = "tuesday">
            <p>Tuesday</p>
        </div>
        
        <div id = "wednesday">
            <p>Wednesday</p>
        </div>
        
        <div id = "thursday">
            <p>Thursday</p>
        </div>
        
        <div id = "friday">
            <p>Friday</p>
        </div>
        
        <div id = "saturday">
            <p>Saturday</p>
        </div>
        
        <div id = "sunday">
            <p>Sunday</p>
        </div>
    </div>

    <div class = "oct30">
        <p>30</p>
    </div>
    
    <div class = "anothermonth">
        <p>31</p>
    </div>
    
    <div class = "days">
        <p>1</p>
    </div>
    
    <div class = "days">
        <p>2</p>
    </div>
    
    <div class = "days">
        <p>3</p>
    </div>
    
    <div class = "days">
        <p>4</p>
    </div>
    
    <div class = "days">
        <p>5</p>
    </div>
    
    <div class = "nextrow">
        <p>6</p>
    </div>
    
    <a href = "pancakes.php">
        <div class = "pancakes">
            <p>7</p>
        </div>
    </a>
    
    <div class = "days">
        <p>8</p>
    </div>
    
    <div class = "days">
        <p>9</p>
    </div>
    
    <div class = "days">
        <p>10</p>
    </div>
    
    <div class = "days">
        <p>11</p>
    </div>
    
    <div class = "days">
        <p>12</p>
    </div>
    
    <div class = "nextrow">
        <p>13</p>
    </div>
  
    <div class = "days">
        <p>14</p>
    </div>
    
    <div class = "days">
        <p>15</p>
    </div>
    
    <div class = "days">
        <p>16</p>
    </div>
    
    <div class = "days">
        <p>17</p>
    </div>
    
    <div class = "days">
        <p>18</p>
    </div>
    
    <div class = "days">
        <p>19</p>
    </div>
    
    <div class = "nextrow">
        <p>20</p>
    </div>
    
    <div class = "days">
        <p>21</p>
    </div>
    
    <div class = "days">
        <p>22</p>
    </div>
    
    <div class = "days">
        <p>23</p>
    </div>
    
    <div class = "days">
        <p>24</p>
    </div>
    
    <a href = "meatballs.php">
        <div class = "meatballs">
            <p>25</p>
        </div>
    </a>
    
    <div class = "days">
        <p>26</p>
    </div>
    
    <div class = "nextrow">
        <p>27</p>
    </div>
    
    <div class = "lastrow">
        <p>28</p>
    </div>
    
    <div class = "lastrow">
        <p>29</p>
    </div>
    
    <div class = "lastrow">
        <p>30</p>
    </div>
    
    <div class = "anothermonth">
        <p>1</p>
    </div>
    
    <div class = "anothermonth">
        <p>2</p>
    </div>
    
    <div class = "anothermonth">
        <p>3</p>
    </div>
    
</body>
</html>