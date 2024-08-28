<style>
    .cars-count-data{
        min-width: 30%;
        max-width: 30%;
        min-height: 30%;
        max-height: 30%;

        margin: 3px 5px;
        padding: 0.5rem;
        border-radius: 10px;
        box-shadow: 2px 2px 6px #08264b3c;
    }
    .cars-count-data{
        /* background-image: linear-gradient(to right top, #bff870, #a6fb7c, #8afd89, #68fe99, #34ffaa); */
        background-image: linear-gradient(to left bottom, #006bd7, #008ae4, #00a3db, #00b8c5, #00c9ac);
        /* background-image: linear-gradient(to left bottom, #ff0000, #ff4a00, #ff6d00, #ff8900, #ffa200); */
        /* background-image: linear-gradient(to left bottom, #2800ff, #0079ff, #00aaff, #00d1fa, #08f1d9); */
    }
    
    #caja-count-logo{
        display: flex;
        justify-content: space-around;
        align-items: center;
    }
    .cantidad-data{
        padding-top: 0.5rem;
        font-size: 3rem;
        color: #031428af
    }
    #logo-fas{
        font-size: 3rem;
        color: #15718a6d;
    }
    .title-card{
        color: #03222a
    }
</style>

<div class="cars-count-data">
    <center>
        <div class="title-card">
            <h4>{{$title}}</h4>
        </div>
    </center>
    <div id="caja-count-logo">
        <div class="caja-cantidad-data">
            <p class="cantidad-data">{{$cantidad}}</p>
        </div>
        <div class="logo-card">
            <i id="logo-fas" class="fas fa-user"></i>
        </div>
    </div>
</div>