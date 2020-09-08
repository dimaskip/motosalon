<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/main.css">
    <title>Интернет-магазин</title>

</head>
<body>
<div id="container" class="container">


    <div id="header" class="header">
        <img src="images/header.png" alt="Шапка">


        <div class="contacts">
            <p class="num">8-800-123-45-67</p>
            <p class="blue">Время работы с 09:00 до 21:00<br>без перерыва и выходних</p>
        </div>

        <div class="reg">
            <a href="#">Войти</a>
            <a href="#">Регистрация</a>

        </div>


        <div class="cart">
            <p class="cart_title">Корзина</p>
            <p class="blue">Текущий заказ</p>
            <p class="in_cart">В корзине<span> 2 </span>товара<br>на сумму <span>700 </span>руб.</p>
            <a href="#">Перейти в корзину</a>
        </div>

    </div>
    <div id="topmenu">
        <ul>
            <li>
                <a href="#">ГЛАВНАЯ</a>
            </li>
            <li>
                <img class="border_menu" src="images/topmenu_border.png" alt="">
            </li>
            <li>
                <a href="#">ОПЛАТА И ДОСТАВКА</a>
            </li>
            <li>
                <img class="border_menu" src="images/topmenu_border.png" alt="">
            </li>
            <li>
                <a href="#">КОНТАКТЫ</a>
            </li>
        </ul>
        <div id="search">
            <form name="search" action="#" method="GET">
                <table>
                    <tr>
                        <td class="input_left"></td>
                        <td>
                            <input type="text" name="q" value="поиск" onfocus="if(this.value=='поиск') this.value=''" onblur="if(this.value=='') this.value='поиск'">
                        </td>
                        <td class="input_right"></td>

                    </tr>
                </table>

            </form>
        </div>
    </div>

    <div id="content" class="content">
        <div id="left"  class="left">
            <div id="menu" class="menu">
                <div id="menu_header" class="menu_header">
                    <h3>Разделы</h3>
                </div>
                <div id="items" class="items">
                    <p>
                        <a href="#">Комедии</a>
                    </p>
                    <p>
                        <a href="#">Исторические</a>
                    </p>
                    <p>
                        <a href="#">Мелодрамы</a>
                    </p>
                    <p>
                        <a href="#">Боевики</a>
                    </p>
                    <p>
                        <a href="#">Аниме</a>
                    </p>
                    <p>
                        <a href="#">Драма</a>
                    </p>
                    <p>
                        <a href="#">Криминал</a>
                    </p>
                    <p class="last">
                        <a href="#">Вестерн</a>
                    </p>
                </div>
                <div class="bottom"></div>



            </div>
        </div>
        <div id="right" class="right">
            <table>
                <tr>
                    <td rowspan="2">
                        <div class="right_header">
                            <h3>Новинки</h3>
                        </div>
                    </td>
                    <td class="section_bg"></td>
                    <td class="section_right"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <table class="sort">
                            <tr>
                                <td>Сортировать по:   </td>
                                <td>    цене(<span>возр.</span>|<span>убыв.</span>)
                                <td>названию   (<span>возр.</span>|<span>убыв.</span>)


                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <table class="products">
                <tr>
                    <td>
                        <div class="intro_product">
                            <p class="img">
                                <img src="images/product.png" alt="Человек паук">
                            </p>
                            <p class="title">
                                <a href="#">Человек паук</a>
                            </p>
                            <p class="price">430 руб.</p>
                            <p>
                                <a class="link_cart" href="#"></a>
                            </p>

                        </div>
                    </td>
                    <td>
                        <div class="intro_product">
                            <p class="img">
                                <img src="images/product.png" alt="Человек паук">
                            </p>
                            <p class="title">
                                <a href="#">Человек паук</a>
                            </p>
                            <p class="price">430 руб.</p>
                            <p>
                                <a class="link_cart" href="#"></a>
                            </p>

                        </div>
                    </td>
                    <td>
                        <div class="intro_product">
                            <p class="img">
                                <img src="images/product.png" alt="Человек паук">
                            </p>
                            <p class="title">
                                <a href="#">Человек паук</a>
                            </p>
                            <p class="price">430 руб.</p>
                            <p>
                                <a class="link_cart" href="#"></a>
                            </p>

                        </div>
                    </td>
                    <td>
                        <div class="intro_product">
                            <p class="img">
                                <img src="images/product.png" alt="Человек паук">
                            </p>
                            <p class="title">
                                <a href="#">Человек паук</a>
                            </p>
                            <p class="price">430 руб.</p>
                            <p>
                                <a class="link_cart" href="#"></a>
                            </p>

                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="intro_product">
                            <p class="img">
                                <img src="images/product.png" alt="Человек паук">
                            </p>
                            <p class="title">
                                <a href="#">Человек паук</a>
                            </p>
                            <p class="price">430 руб.</p>
                            <p>
                                <a class="link_cart" href="#"></a>
                            </p>

                        </div>
                    </td>
                    <td>
                        <div class="intro_product">
                            <p class="img">
                                <img src="images/product.png" alt="Человек паук">
                            </p>
                            <p class="title">
                                <a href="#">Человек паук</a>
                            </p>
                            <p class="price">430 руб.</p>
                            <p>
                                <a class="link_cart" href="#"></a>
                            </p>

                        </div>
                    </td>
                    <td>
                        <div class="intro_product">
                            <p class="img">
                                <img src="images/product.png" alt="Человек паук">
                            </p>
                            <p class="title">
                                <a href="#">Человек паук</a>
                            </p>
                            <p class="price">430 руб.</p>
                            <p>
                                <a class="link_cart" href="#"></a>
                            </p>

                        </div>
                    </td>
                    <td>
                        <div class="intro_product">
                            <p class="img">
                                <img src="images/product.png" alt="Человек паук">
                            </p>
                            <p class="title">
                                <a href="#">Человек паук</a>
                            </p>
                            <p class="price">430 руб.</p>
                            <p>
                                <a class="link_cart" href="#"></a>
                            </p>

                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="intro_product">
                            <p class="img">
                                <img src="images/product.png" alt="Человек паук">
                            </p>
                            <p class="title">
                                <a href="#">Человек паук</a>
                            </p>
                            <p class="price">430 руб.</p>
                            <p>
                                <a class="link_cart" href="#"></a>
                            </p>

                        </div>
                    </td>
                    <td>
                        <div class="intro_product">
                            <p class="img">
                                <img src="images/product.png" alt="Человек паук">
                            </p>
                            <p class="title">
                                <a href="#">Человек паук</a>
                            </p>
                            <p class="price">430 руб.</p>
                            <p>
                                <a class="link_cart" href="#"></a>
                            </p>

                        </div>
                    </td>
                    <td>
                        <div class="intro_product">
                            <p class="img">
                                <img src="images/product.png" alt="Человек паук">
                            </p>
                            <p class="title">
                                <a href="#">Человек паук</a>
                            </p>
                            <p class="price">430 руб.</p>
                            <p>
                                <a class="link_cart" href="#"></a>
                            </p>

                        </div>
                    </td>
                    <td>
                        <div class="intro_product">
                            <p class="img">
                                <img src="images/product.png" alt="Человек паук">
                            </p>
                            <p class="title">
                                <a href="#">Человек паук</a>
                            </p>
                            <p class="price">430 руб.</p>
                            <p>
                                <a class="link_cart" href="#"></a>
                            </p>

                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="intro_product">
                            <p class="img">
                                <img src="images/product.png" alt="Человек паук">
                            </p>
                            <p class="title">
                                <a href="#">Человек паук</a>
                            </p>
                            <p class="price">430 руб.</p>
                            <p>
                                <a class="link_cart" href="#"></a>
                            </p>

                        </div>
                    </td>
                    <td>
                        <div class="intro_product">
                            <p class="img">
                                <img src="images/product.png" alt="Человек паук">
                            </p>
                            <p class="title">
                                <a href="#">Человек паук</a>
                            </p>
                            <p class="price">430 руб.</p>
                            <p>
                                <a class="link_cart" href="#"></a>
                            </p>

                        </div>
                    </td>
                    <td>
                        <div class="intro_product">
                            <p class="img">
                                <img src="images/product.png" alt="Человек паук">
                            </p>
                            <p class="title">
                                <a href="#">Человек паук</a>
                            </p>
                            <p class="price">430 руб.</p>
                            <p>
                                <a class="link_cart" href="#"></a>
                            </p>

                        </div>
                    </td>
                    <td>
                        <div class="intro_product">
                            <p class="img">
                                <img src="images/product.png" alt="Человек паук">
                            </p>
                            <p class="title">
                                <a href="#">Человек паук</a>
                            </p>
                            <p class="price">430 руб.</p>
                            <p>
                                <a class="link_cart" href="#"></a>
                            </p>

                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="clear"></div>
        <div id="footer">
            <div id="pm">
                <table>
                    <tr>
                        <td>Способы оплаты:</td>
                        <td>
                            <img src="images/pay.png" alt="Платежная система">
                        </td>
                    </tr>
                </table>
            </div>
            <div id="copy">
                <p>Copyright © Site.ru. Все права защищены.</p>
                <p class="counter">
                    <img src="images/counter.png" alt="Счётчик">
                </p>
            </div>
        </div>

    </div>
</div>
</body>
</html>