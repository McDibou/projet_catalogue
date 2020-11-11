<!-- page 404 with its style to be independent of the site  -->
<style>
    #notfound {
        position: relative;
    }

    #notfound .notfound {
        position: absolute;
        left: 50%;
        top:14rem;
        transform: translateX(-50%);
    }

    .notfound {
        max-width: 520px;
        width: 100%;
        line-height: 1.4;
        text-align: center;
    }

    .notfound .notfound-404 {
        position: relative;
        height: 240px;
    }

    .notfound .notfound-404 h1 {
        font-family: 'Montserrat', sans-serif;
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        font-size: 252px;
        font-weight: 900;
        margin: 0 0 0 -20px;
        color: #262626;
        text-transform: uppercase;
        letter-spacing: -40px;
    }

    .notfound .notfound-404 h1>span {
        text-shadow: -8px 0 0 #fff;
    }

    .notfound .notfound-404 h3 {
        font-family: 'Cabin', sans-serif;
        position: relative;
        font-size: 16px;
        font-weight: 700;
        text-transform: uppercase;
        color: #262626;
        margin: 0;
        letter-spacing: 3px;
        padding-left: 6px;
    }

    .notfound h2 {
        font-family: 'Cabin', sans-serif;
        font-size: 20px;
        font-weight: 400;
        text-transform: uppercase;
        color: #000;
        margin-top: 0;
        margin-bottom: 25px;
    }

</style>
<!-- html from error 404 -->
<div id="notfound">
    <div class="notfound">
        <div class="notfound-404">
            <h3>Oops! Page not found</h3>
            <h1><span>4</span><span>0</span><span>4</span></h1>
        </div>
        <h2>we are sorry, but the page you requested was not found</h2>
        <!-- div used to go back one page -->
        <h2 onclick="history.go(-1)" style="cursor: pointer">Back</h2>
    </div>
</div>