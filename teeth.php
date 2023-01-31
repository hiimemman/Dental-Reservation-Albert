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
        position: relative;
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
        cursor: pointer;
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
        <div class="tooth" title="This is a tooltip" id="tooth-1" style ="top: 24%;left: 25px;" >
            <img src="./teeths/teeth1.png" alt="lag HAHA">
        </div>
        <div class="tooth" title="This is a tooltip" id="tooth-2" style ="top: 19.2%;left: 34px;">
          <img src="./teeths/teeth2.png" alt="lag HAHA">
        </div>
        <div class="tooth" title="This is a tooltip" id="tooth-3" style ="top: 14.6%;left: 42px;">
          <img src="./teeths/teeth3.png" alt="lag HAHA">
        </div>
        <div class="tooth" title="This is a tooltip" id="tooth-4" style ="top: 11.2%;left: 58px;">
         <img src="./teeths/teeth4.png" alt="lag HAHA">
        </div>
        <div class="tooth" title="This is a tooltip" id="tooth-5" style ="top: 8.5%;left: 77px;">
         <img src="./teeths/teeth5.png" alt="lag HAHA">
        </div>
        <div class="tooth" title="This is a tooltip" id="tooth-6" style ="top: 7.0%;left: 103px;">
         <img src="./teeths/teeth6.png" alt="lag HAHA">
        </div>
        <div class="tooth" title="This is a tooltip" id="tooth-7" style ="top: 5.50%;left: 126px;">
          <img src="./teeths/teeth7.png" alt="lag HAHA">
        </div>
        <div class="tooth" title="This is a tooltip" id="tooth-8" style ="top: 4.94%;left: 153px;">
          <img src="./teeths/teeth8.png" alt="lag HAHA">
        </div>
        <div class="tooth flip-teeth-horizontal" id="tooth-9" style ="top: 5.10%;left: 213px;">
          <img src="./teeths/teeth8.png" alt="lag HAHA">
        </div>
        <div class="tooth flip-teeth-horizontal" id="tooth-10" style ="top: 5.67%;left: 238px;">
         <img src="./teeths/teeth7.png" alt="lag HAHA">
        </div>
        <div class="tooth flip-teeth-horizontal" id="tooth-11" style ="top: 7.00%;left: 257px;">
          <img src="./teeths/teeth6.png" alt="lag HAHA">
        </div>
        <div class="tooth flip-teeth-horizontal" id="tooth-12" style ="top: 8.50%; left: 280px;">
          <img src="./teeths/teeth5.png" alt="lag HAHA">
        </div>
        <div class="tooth flip-teeth-horizontal" id="tooth-13" style ="top: 11.30%; left: 298px;">
          <img src="./teeths/teeth4.png" alt="lag HAHA">
        </div>
        <div class="tooth flip-teeth-horizontal" id="tooth-14" style ="top: 14.74%; left: 315px;">
         <img src="./teeths/teeth3.png" alt="lag HAHA">
        </div>
        <div class="tooth flip-teeth-horizontal" id="tooth-15" style ="top: 19.42%; left: 325px;">
          <img src="./teeths/teeth2.png" alt="lag HAHA">
        </div>
        <div class="tooth flip-teeth-horizontal" id="tooth-16" style ="top: 24.20%; left: 331px;">
          <img src="./teeths/teeth1.png" alt="lag HAHA">
        </div>
    </div>

    <div id ="bottom-part">
        <div class="tooth flip-teeth-vertical" id="tooth-17" style ="top: 44.20%; left: 26px;">
         <img src="./teeths/teeth1.png" alt="lag HAHA">
        </div>
        <div class="tooth flip-teeth-vertical" id="tooth-18" style ="top: 49.00%; left: 34px;">
         <img src="./teeths/teeth2.png" alt="lag HAHA">
        </div>
        <div class="tooth flip-teeth-vertical" id="tooth-19"
        style ="top: 53.70%; left: 43px;">
          <img src="./teeths/teeth3.png" alt="lag HAHA">
        </div>
        <div class="tooth flip-teeth-vertical" id="tooth-20"
        style ="top: 57.10%; left: 58px;">
         <img src="./teeths/teeth4.png" alt="lag HAHA">
        </div>
        <div class="tooth flip-teeth-vertical" id="tooth-21"
        style ="top: 59.85%; left: 78px;">
         <img src="./teeths/teeth5.png" alt="lag HAHA">
        </div>
        <div class="tooth" title="This is a tooltip" id="tooth-22"
        style ="top: 57.77%; left: 104px;">
          <img src="./teeths/teeth6-lower.png" alt="lag HAHA">
        </div>
        <div class="tooth" title="This is a tooltip" id="tooth-23"
        style ="top: 58.68%; left: 126px;">
         <img src="./teeths/teeth7-lower.png" alt="lag HAHA">
        </div>
        <div class="tooth" title="This is a tooltip" id="tooth-24"
        style ="top: 58.81%; left: 152px;"
        >
         <img src="./teeths/teeth8-lower.png" alt="lag HAHA">
        </div>
        <div class="tooth flip-teeth-horizontal" id="tooth-25"
        style ="top: 58.83%; left: 203px;"
        >
         <img src="./teeths/teeth8-lower.png" alt="lag HAHA">
        </div>
        <div class="tooth flip-teeth-horizontal" id="tooth-26"
        style ="top: 58.77%; left: 230px;">
         <img src="./teeths/teeth7-lower.png" alt="lag HAHA">
        </div>
        <div class="tooth flip-teeth-horizontal" id="tooth-27"
        style ="top: 57.82%; left: 253px;">
          <img src="./teeths/teeth6-lower.png" alt="lag HAHA">
        </div>
        <div class="tooth flip-teeth-both" id="tooth-28"
        style ="top: 59.92%; left: 280px;">
          <img src="./teeths/teeth5.png" alt="lag HAHA">
        </div>
        <div class="tooth flip-teeth-both" id="tooth-29"
        style ="top: 57.10%; left: 300px;">
         <img src="./teeths/teeth4.png" alt="lag HAHA">
        </div>
        <div class="tooth flip-teeth-both" id="tooth-30"
        style ="top: 53.70%; left: 315px;">
          <img src="./teeths/teeth3.png" alt="lag HAHA">
        </div>
        <div class="tooth flip-teeth-both" id="tooth-31"
        style ="top:  49.00%; left: 325px;">
          <img src="./teeths/teeth2.png" alt="lag HAHA">
        </div>
        <div class="tooth flip-teeth-both" id="tooth-32"
        style ="top:  44.20%; left: 331px;">
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
    selectedTeeth =  document.getElementById(tooth.id);
    let img = selectedTeeth.querySelector("img"); 
    img.src = img.src.substr(0, img.src.length - 4) + "-green.png";;
    // alert(`Tooth ${tooth.id} clicked!`)
  
  });
});
</script>
</body>
</html>