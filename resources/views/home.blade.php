@extends('layouts.application')

@section('maincss')
    <link rel="stylesheet" href="../css/apphome.css" type="text/css">
@endsection
@section('information')
    <div id="heading">
        <h1>ГЛАВНАЯ</h1>
    </div>
    <section>
        <blockquote>
            <p>
                “Если бы Pac-Man повлиял на нас, когда мы были детьми,
                мы бы все кружились в затемненной комнате, жуя волшебные
                таблетки и слушая повторяющуюся электронную музыку..”
            </p>
            <cite>Маркус Бригсток</cite>
        </blockquote>
        <script>
            function readMore() {
                var dots = document.getElementById("dots");
                var more = document.getElementById("more");
                var btn = document.getElementById("btn");

                if (dots.style.display === "none") {
                    dots.style.display="inline";
                    btn.innerHTML="Подробнее";
                    more.style.display="none";
                } else {
                    dots.style.display="none";
                    btn.innerHTML="Скрыть";
                    more.style.display="inline";
                }
            }
        </script>
        <p>Игры на ПК — это отличный метод расслабиться и отвлечься от суровых будней, особенно, если вы можете скачать их через торрент, абсолютно без каких-либо регистраций и оплат.</p>
        <p>Администрация данного ресурса старательно отыскивает и добавляет на просторы каталога взломанные игры только от самых лучших релизных групп, таких как xatab, Механики, qoob, VickNet, FitGirl. Мы следим за качеством контента для удобства пользователей сайта, поэтому наш посетитель без труда может отыскать интересующую его игру на пк бесплатно.</p>
        <p>У нас нет навязчивой регистрации и, что самое главное, наш ресурс никогда не будет перегружен рекламой – заходите к нам и качайте игры бесплатно!.</p>
        <style>
            #more {display:none;}
        </style>
        <p>Чем полезны для мозга компьютерные игры.
            Исследования демонстрируют длительный положительный эффект от видеоигр для таких основных психических процессов, как <span id="dots">...</span><span id="more">восприятие, внимание, память и принятие решений. Активные видеоигры требуют, чтобы игроки быстро двигались, следили за многими элементами одновременно, сразу же обрабатывали новую информации и выдавали решения за доли секунды.

            Многие из способностей, отточенных такими играми, психологи считают основными строительными блоками интеллекта. Они помогают улучшению пространственного внимания, развивают способность отслеживать движущиеся объекты, снижают импульсивность, помогают преодолеть дислексию.

            Видеоигры улучшают способность мозга решать несколько задач одновременно (мультитаскинг) и повышают гибкость ума.

        </span></p>
        <button id="btn" onclick="readMore()">Подробнее</button><br/><br/>




        <figure>
            <img src="../images/pub1.png" width="300" height="165" alt="">
        </figure>
        <figure>
            <img src="../images/pub2.png" width="300" height="165" alt="">
        </figure>
        <figure>
            <img src="../images/pub3.png" width="300" height="165" alt="">
        </figure>
        <figure>
            <img src="../images/pub4.png" width="300" height="165" alt="">
        </figure>
        <h2>НАША КОМАНДА</h2>
        <div class="team-row">
            <figure>
                <img src="../images/per1.png" width="210" height="140" alt="">
                <figcaption>Иванов Сергей<span>Глава сайта</span></figcaption>
            </figure>
            <figure>
                <img src="../images/per2.png" width="210" height="140" alt="">
                <figcaption>Пестрин Андрей<span>Администратор</span></figcaption>
            </figure>
            <figure>
                <img src="../images/per4.png" width="210" height="140" alt="">
                <figcaption>Финский Петр<span>Помощник администратора</span></figcaption>
            </figure>
            <figure>
                <img src="../images/per3.png" width="210" height="140" alt="">
                <figcaption>Челаева София<span>Менеджер</span></figcaption>
            </figure>
            <figure>
                <img src="../images/per5.png" width="210" height="140" alt="">
                <figcaption>Белый Анатолий<span>Программист</span></figcaption>
            </figure>
        </div>
    </section>
@endsection





