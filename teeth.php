<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sample teeth</title>
    <link rel="preload" href="./teeths/TOOTH-DIAGRAM.png" as="image">
    <style>
        #teeth-diagram {
          display: flex;
          background: url('./teeths/TOOTH-DIAGRAM.png') no-repeat;
          height: 1000px;
        }
        #upper-part {
        display: flex;
        position: relative;
        }
        #bottom-part {
        display: flex;
        }
        /* .tooth {
        width: 50px;
        height: 50px;
        border: 1px solid black;
        } */
           .tooth {
        width: 5px;
        height: 5px;
        background-color: transparent;
        border: none;
        box-shadow: none;
        text-shadow: none;
        position:absolute;
        }
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
  <p>Teeth Diagram</p>
<div id="teeth-diagram">
    <div id="upper-part">
        <div class="tooth" id="tooth-1" style ="top: 24%;left: 25px;">
            <img src="./teeths/teeth1.png" alt="lag HAHA">
        </div>
        <div class="tooth" id="tooth-2" style ="top: 19.2%;left: 32px;">
          <img src="./teeths/teeth2.png" alt="lag HAHA">
        </div>
        <div class="tooth" id="tooth-3" style ="top: 14.6%;left: 42px;">
          <img src="./teeths/teeth3.png" alt="lag HAHA">
        </div>
        <div class="tooth" id="tooth-4" style ="top: 11.2%;left: 58px;">
         <img src="./teeths/teeth4.png" alt="lag HAHA">
        </div>
        <div class="tooth" id="tooth-5" style ="top: 8.5%;left: 77px;">
         <img src="./teeths/teeth5.png" alt="lag HAHA">
        </div>
        <div class="tooth" id="tooth-6" style ="top: 7.0%;left: 103px;">
         <img src="./teeths/teeth6.png" alt="lag HAHA">
        </div>
        <div class="tooth" id="tooth-7" style ="top: 5.50%;left: 124px;">
          <img src="./teeths/teeth7.png" alt="lag HAHA">
        </div>
        <div class="tooth" id="tooth-8" style ="top: 4.94%;left: 153px;">
          <img src="./teeths/teeth8.png" alt="lag HAHA">
        </div>
        <div class="tooth flip-teeth-horizontal" id="tooth-9" style ="top: 5.18%;left: 210px;">
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
        <div class="tooth" id="tooth-22">
          <img src="./teeths/teeth6-lower.png" alt="lag HAHA">
        </div>
        <div class="tooth" id="tooth-23">
         <img src="./teeths/teeth7-lower.png" alt="lag HAHA">
        </div>
        <div class="tooth flip-teeth-horizontal" id="tooth-24">
         <img src="./teeths/teeth8-lower.png" alt="lag HAHA">
        </div>
        <div class="tooth flip-teeth-horizontal" id="tooth-25">
         <img src="./teeths/teeth8-lower.png" alt="lag HAHA">
        </div>
        <div class="tooth flip-teeth-horizontal" id="tooth-26">
         <img src="./teeths/teeth7-lower.png" alt="lag HAHA">
        </div>
        <div class="tooth flip-teeth-horizontal" id="tooth-27">
          <img src="./teeths/teeth6-lower.png" alt="lag HAHA">
        </div>
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
    alert(`Tooth ${tooth.id} clicked!`)
  });
});
</script>
</body>
</html>