<template>
  <div class="notfound">
    <div class="error"></div>
    <div class="etext">页面不存在！</div>
  </div>
</template>

<style scoped>
   .notfound{
     padding-top: 120px;
     margin-top: -800px;
   }
   .error{
     width:200px;
     height:200px;
     margin: auto;
     background: url(../../assets/images/error.png) no-repeat;
     background-size: 100%;
     background-position: -20px center;
     margin-bottom: 50px;
   }
   .etext{
     text-align:center;
     color:white;
     font-size: 14px;
   }
</style>
