<!DOCTYPE html>
<head>
	<meta charset="utf-8" />
	<script type="text/javascript" src="js/jquery-2.1.1.js"></script>
    <script type="text/javascript" src="js/jquery.the-modal.js"></script>
    <script type="text/javascript" src="js/handler.js"></script>
    <link rel="stylesheet" type="text/css" href="css/the-modal.css" media="all">
    <link rel="stylesheet" type="text/css" href="css/style.css" media="all">
</head>
<body>
    <div id="find_area">
        <button id="find_btn">find an advertisement</button>
        <div id="find_form_div" style="display: none">
            <form id="find_form">
                <br>From
                <select id="from_topics_of_barter_find">
                    <?php
                        include("main.php");
                        barter_topics();
                    ?>
                </select>
                <br>To
                <select id="to_topics_of_barter_find">
                    <?php barter_topics(); ?>
                </select>
                <br>Keywords
                <input type="text" id="description_find" autocomplete="off"/>
                <br>Region
                <select id="region_find">
                    <option value="0">Вся Россия</option>
                    <?php region_selection() ?>
                </select>
                <br>City
                <input list="city_find" id="city_selected_find" autocomplete="off">
                <datalist id="city_find" autocomplete="off">
                </datalist>
                <input type="submit" id="submit_find"/>
            </form>
        </div>
        <br>
    </div>
    <div id="suggest_area">
        <button id="suggest_btn">Suggest an advertisment</button>
        <div id="suggest_div" style="display: none">
            <form id="suggest_form">
                <br>From
                <select id="from_topics_of_barter_suggest">
                    <?php barter_topics(); ?>
                </select>
                <br>To
                <select id="to_topics_of_barter_suggest">
                    <?php barter_topics(); ?>
                </select>
                <br>Title
                <input type="text" id="title_suggest" required autocomplete="off"/>
                <br>Description
                <input type="text" id="description_suggest" autocomplete="off" required/>
                <br>Contacts
                <input type="text" id="contacts_suggest" autocomplete="off" required/>
                <br>Name
                <input type="text" id="name_suggest" autocomplete="off" required/>
                <br>Price
                <input type="number" id="price_suggest" autocomplete="off" required/>
                <br>Region
                <select id="region_suggest">
                    <?php region_selection() ?>
                </select>
                <br>City
                <input list="city_suggest" id="city_selected_suggest" required autocomplete="off">
                <datalist id="city_suggest" autocomplete="off">
                </datalist>
                <input type="submit" id="submit_suggest"/>
            </form>
        </div>
    </div>

   <!-- <button id="advertisment-open">place an advertisement</button>

    <div class="modal" id="advertisment" style="display: none">
        <a href="#" class="close">&times;</a>
        test your luck and might
    </div>-->
</body>
