<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sample teeth</title>
    <style>
        /* #teeth-diagram {
        display: flex;
        } */
        #upper-part {
        display: flex;
        }
        #bottom-part {
        display: flex;
        }
        .tooth {
        width: 50px;
        height: 50px;
        border: 1px solid black;
        }
           /* .tooth {
        width: 50px;
        height: 50px;
        background-color: transparent;
        border: none;
        box-shadow: none;
        text-shadow: none;
        } */
        .flip-teeth-horizontal {
        transform: scaleX(-1);
        }
        .flip-teeth-vertical {
        transform: scaleY(-1);
        }
        .flip-teeth-both{
          transform: rotate(180deg);
        }
    </style>
</head>
<body>
<div id="teeth-diagram">
    <div id="upper-part">
        <div class="tooth" id="tooth-1">
            <img src="./teeths/teeth1.png" alt="lag HAHA">
        </div>
        <div class="tooth" id="tooth-2">
          <img src="./teeths/teeth2.png" alt="lag HAHA">
        </div>
        <div class="tooth" id="tooth-3">
          <img src="./teeths/teeth3.png" alt="lag HAHA">
        </div>
        <div class="tooth" id="tooth-4">
         <img src="./teeths/teeth4.png" alt="lag HAHA">
        </div>
        <div class="tooth" id="tooth-5">
         <img src="./teeths/teeth5.png" alt="lag HAHA">
        </div>
        <div class="tooth" id="tooth-6">
         <img src="./teeths/teeth6.png" alt="lag HAHA">
        </div>
        <div class="tooth" id="tooth-7">
          <img src="./teeths/teeth7.png" alt="lag HAHA">
        </div>
        <div class="tooth" id="tooth-8">
          <img src="./teeths/teeth8.png" alt="lag HAHA">
        </div>
        <div class="tooth flip-teeth-horizontal" id="tooth-9">
          <img src="./teeths/teeth8.png" alt="lag HAHA">
        </div>
        <div class="tooth flip-teeth-horizontal" id="tooth-10">
         <img src="./teeths/teeth7.png" alt="lag HAHA">
        </div>
        <div class="tooth flip-teeth-horizontal" id="tooth-11">
          <img src="./teeths/teeth6.png" alt="lag HAHA">
        </div>
        <div class="tooth flip-teeth-horizontal" id="tooth-12">
          <img src="./teeths/teeth5.png" alt="lag HAHA">
        </div>
        <div class="tooth flip-teeth-horizontal" id="tooth-13">
          <img src="./teeths/teeth4.png" alt="lag HAHA">
        </div>
        <div class="tooth flip-teeth-horizontal" id="tooth-14">
         <img src="./teeths/teeth3.png" alt="lag HAHA">
        </div>
        <div class="tooth flip-teeth-horizontal" id="tooth-15">
          <img src="./teeths/teeth2.png" alt="lag HAHA">
        </div>
        <div class="tooth flip-teeth-horizontal" id="tooth-16">
          <img src="./teeths/teeth1.png" alt="lag HAHA">
        </div>
    </div>
    <div id ="bottom-part">
        <div class="tooth flip-teeth-vertical" id="tooth-17">
         <img src="./teeths/teeth1.png" alt="lag HAHA">
        </div>
        <div class="tooth flip-teeth-vertical" id="tooth-18">
         <img src="./teeths/teeth2.png" alt="lag HAHA">
        </div>
        <div class="tooth flip-teeth-vertical" id="tooth-19">
          <img src="./teeths/teeth3.png" alt="lag HAHA">
        </div>
        <div class="tooth flip-teeth-vertical" id="tooth-20">
         <img src="./teeths/teeth4.png" alt="lag HAHA">
        </div>
        <div class="tooth flip-teeth-vertical" id="tooth-21">
         <img src="./teeths/teeth5.png" alt="lag HAHA">
        </div>
        <div class="tooth" id="tooth-22"></div>
        <div class="tooth" id="tooth-23"></div>
        <div class="tooth" id="tooth-24"></div>
        <div class="tooth" id="tooth-25"></div>
        <div class="tooth" id="tooth-26"></div>
        <div class="tooth" id="tooth-27"></div>
        <div class="tooth flip-teeth-both" id="tooth-28">
          <img src="./teeths/teeth5.png" alt="lag HAHA">
        </div>
        <div class="tooth flip-teeth-both" id="tooth-29">
         <img src="./teeths/teeth4.png" alt="lag HAHA">
        </div>
        <div class="tooth flip-teeth-both" id="tooth-30">
          <img src="./teeths/teeth3.png" alt="lag HAHA">
        </div>
        <div class="tooth flip-teeth-both" id="tooth-31">
          <img src="./teeths/teeth2.png" alt="lag HAHA">
        </div>
        <div class="tooth flip-teeth-both" id="tooth-32">
         <img src="./teeths/teeth1.png" alt="lag HAHA">
        </div>
    </div>
  
 

  <!-- Add more teeth as needed -->
</div>

<script defer>
const teeth = document.querySelectorAll('.tooth');
teeth.forEach(tooth => {
  tooth.addEventListener('click', event => {
    // Add code to handle the tooth click event here
    console.log(`Tooth ${tooth.id} clicked!`);
  });
});
</script>
</body>
</html>