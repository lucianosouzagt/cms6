<!DOCTYPE html>
<html>
<head>
<style>  
  
.b1 { grid-area:d2x4-1; }
.b2 { grid-area:d2x4-2 }
.a1 { grid-area:d2x2-1 }
.a2 { grid-area:d2x2-2; }
.c1 { grid-area:d4x4-1; }
.c2 { grid-area:d4x4-2; }
.a3 { grid-area:d2x2-3; }
.c3 { grid-area:d4x4-3; }
.a4 { grid-area:d2x2-4 }
.b3 { grid-area:d2x4-3 }
.a5 { grid-area:d2x2-5; }
.b4 { grid-area:d2x4-4; }
.b5 { grid-area:d2x4-5; }
.c4 { grid-area:d4x4-4; }
.a6 { grid-area:d2x2-6; }
.b6 { grid-area:d2x4-6 }
.a7 { grid-area:d2x2-7 }
.a8 { grid-area:d2x2-8; }
.b7 { grid-area:d2x4-7; }
.b8 { grid-area:d2x4-8; }
.b9 { grid-area:d2x4-9; }
.a9 { grid-area:d2x2-9; }
.a10{ grid-area:d2x2-a }
.a11{ grid-area:d2x2-b }

.diva{
  width: 200px;
  height: 200px;
}
.divb{
  width: 400px;
  height: 200px;
}
.divc{
  width: 400px;
  height: 400px;
}

.grid-container {
  width: 1010px;
  display: grid;
  grid-template-areas:
    'd2x4-1 d2x4-1 d2x4-2 d2x4-2 d2x2-1'
    'd2x2-2 d4x4-1 d4x4-1 d4x4-2 d4x4-2'
    'd2x2-3 d4x4-1 d4x4-1 d4x4-2 d4x4-2'
    'd4x4-3 d4x4-3 d2x2-4 d2x4-3 d2x4-3'
    'd4x4-3 d4x4-3 d2x2-5 d2x4-4 d2x4-4'
    'd2x4-5 d2x4-5 d4x4-4 d4x4-4 d2x2-6'
    'd2x4-6 d2x4-6 d4x4-4 d4x4-4 d2x2-7'
    'd2x2-8 d2x4-7 d2x4-7 d2x4-8 d2x4-8'
    'd2x4-9 d2x4-9 d2x2-9 d2x2-a d2x2-b';
  background-color: #2196F3;
  gap: 3px;
}

.grid-container > div {
  background-color: rgba(255, 255, 255, 0.8);
  text-align: center;
  font-size: 30px;
}
</style>
</head>
<body>
<div class="grid-container">
  <div class="divb b1">2x4-1</div>
  <div class="divb b2">2x4-2</div>
  <div class="diva a1">2x2-1</div>  
  <div class="diva a2">2x2-2</div>
  <div class="divc c1">4x4-1</div>
  <div class="divc c2">4x4-2</div>
  <div class="diva a3">2x2-3</div>
  <div class="divc c3">4x4-3</div>
  <div class="diva a4">2x2-4</div>
  <div class="divb b3">2x4-3</div>  
  <div class="diva a5">2x2-5</div>
  <div class="divb b4">2x4-4</div>
  <div class="divb b5">2x4-5</div>
  <div class="divc c4">4x4-4</div>
  <div class="diva a6">2x2-6</div>
  <div class="divb b6">2x4-6</div>
  <div class="diva a7">2x2-7</div>  
  <div class="diva a8">2x2-8</div>
  <div class="divb b7">2x4-7</div>
  <div class="divb b8">2x4-8</div>
  <div class="divb b9">2x4-9</div>
  <div class="diva a9">2x2-9</div>
  <div class="diva a10">2x2-1o</div>
  <div class="diva a11">2x2-11</div>
</div>

</body>
</html>
