<template>
    <div class="box-container">
        <div class="box">
            <div class="title">
                <h5>Are you sure !!</h5>
                <h3>Press ok to delete this item</h3>
            </div>
            <div class="btn btn-danger float-left">Cancle</div>
            <div class="btn btn-primary float-right">OK</div>
        </div>
    </div>
</template>

<style scoped>
    .box-container{
        position: fixed;
        top:0;
        left:0;
        width: 100%;
        height: 100%;
        z-index: 100;
    }
    .box-container .box{
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%,-50%);
        width: 350px;
        height: 300px;
        background-color: white;
    }
    .box-container .box .title h5{
        text-align: center;
    }
    .box-container .box .title h3{
        text-align: center;
    }
</style>