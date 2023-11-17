<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">
            *{
              padding: 0;
              margin: 0;
              box-sizing: border-box;
            }
            body{
              background-color: grey;
            }
            .wrapper{
              display: grid;
              /* max-width: 100%; */
              grid-template-columns: 1fr 1fr 1fr 1fr;
              grid-template-rows: 50px 350px 350px 350px;
            }
            .wrapper .welcome{
              grid-row-start: 1;
              grid-row-end: 2;
              grid-column-start: 1;
              grid-column-end: 2;
            }
            .wrapper .sidebar{
              grid-row-start: 2;
              grid-row-end: 5;
              grid-column-start: 1;
              grid-column-end: 2;
            }
            .wrapper .admin-buttons{
              grid-column-start: 2;
              grid-column-end: 4;
              grid-row-start: 1;
              grid-row-end: 2;
              display: flex;
              justify-content: space-around;
              align-items: center;
            }
            .wrapper .admin-buttons button{
              padding: 4px 10px;
              border-radius: 4px;
              font-weight: 600;
            }
            .wrapper .disease{
              grid-column-start: 2;
              grid-column-end: 3;
              grid-row-start: 2;
              grid-row-end: 3;
            }
            .wrapper .disease select,.wrapper .internal-prescription select,.wrapper .external-prescription select,.symptoms select,.tests select{
              width:98%;
            }
            .wrapper .disease button,.wrapper .internal-prescription button,.wrapper .external-prescription button,.symptoms button,.tests button{
              width: 48%;
            }
            .wrapper .disease textarea,.wrapper .internal-prescription textarea,.wrapper .external-prescription textarea,.symptoms textarea,.tests textarea{
              width: 98%;
              height: 50%;
            }
            .wrapper .internal-prescription{
              grid-column-start: 3;
              grid-column-end: 4;
              grid-row-start: 2;
              grid-row-end: 3;
            }
            .wrapper .internal-dosage{
              grid-column-start: 4;
              grid-column-end: 5;
              grid-row-start: 2;
              grid-row-end: 3;
              display: grid;
              grid-template-columns: 0.1fr 0.8fr;
            }
            .wrapper .checkup{
              grid-column-start: 2;
              grid-column-end: 3;
              grid-row-start: 3;
              grid-row-end: 4;
              display: grid;
            }
            .wrapper .external-prescription{
              grid-column-start: 3;
              grid-column-end: 4;
              grid-row-start: 3;
              grid-row-end: 4;
            }
            .wrapper .external-dosage{
              grid-column-start: 4;
              grid-column-end: 5;
              grid-row-start: 3;
              grid-row-end: 4;
              display: grid;
              grid-template-columns: 0.1fr 0.8fr;
            }
            .symptoms{
              grid-column-start: 2;
              grid-column-end: 3;
              grid-row-start: 4;
              grid-row-end: 5;
            }
            .tests{
              grid-column-start: 3;
              grid-column-end: 4;
              grid-row-start: 4;
              grid-row-end: 5;
            }
            .final{
              grid-column-start: 4;
              grid-column-end: 5;
              grid-row-start: 4;
              grid-row-end: 5;
            }
            .sidebar{
              display: grid;
              grid-template-columns: 1fr;
              grid-template-rows: 0.5fr 1fr;
              grid-gap: 50px;
            }
            .sidebar .top-header{
              display: grid;
              grid-template-columns: 0.8fr;
            }
            .sidebar .bottom-header{
              display: grid;
              grid-template-columns: 0.8fr;
            }
            .makegrid{
              display: grid;
            }
    </style>
  </head>
  <body>
         <div class="wrapper">
           <div class="welcome">
                 Welcome <span id="doctorname"> <?php echo $_SESSION["doctorname"] ?> </span>
           </div>
                <div class="sidebar">
                      <div class="top-header">
                            <span>Date</span>
                            <select id="selectdate">
                                    <script type="text/javascript">

                                            // var dt = new Date();
                                            // console.log(dt);
                                            // console.log(dt.toISOString());
                                            // console.log(dt.toISOString().split('T'));
                                            // console.log(dt.toISOString().split('T')[0]);
                                            //
                                            // var tomorrow = new Date();
                                            // tomorrow.setDate(new Date().getDate()+10);
                                            // console.log(tomorrow);

                                            let date = new Date();
                                            let dt,t;
                                            for(i=-30;i<=10;i++){
                                                 dt = new Date().getDate()+i;
                                                 date.setDate(dt);
                                                 console.log(date);
                                                 t = date.toISOString().split('T')[0]
                                                 console.log(t);
                                                 let a = document.createElement("option");
                                                 a.classList.add("dates");
                                                 a.innerHTML = t;
                                                 document.getElementById('selectdate').appendChild(a);
                                                 console.log(a);
                                            }
                                    </script>
                            </select>
                            <span>Patient</span>
                            <select id="patient-name">
                                    <script type="text/javascript">
                                              b = document.getElementsByClassName("dates");
                                              c = document.getElementById('selectdate');
                                              // console.log(c);
                                              // console.log(b[4]);
                                              c.addEventListener("click",function(){
                                                   console.log(this.value);
                                                   let xhr = new XMLHttpRequest();
                                                   xhr.onload = function(){
                                                      var a = xhr.responseText;
                                                      // console.log(a);
                                                      document.getElementById('patient-name').innerHTML = a;
                                                   }
                                                   let requestData = `date=${this.value}`;
                                                   console.log(requestData);
                                                   xhr.open('post','checkup_server.php');
                                                   xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');
                                                   xhr.send(requestData);
                                              });

                                    </script>
                            </select>
                             <script type="text/javascript">
                                      // After the doctor has received all the patient's at a date, and he clicks a patient, and than calls a patient.




                                      function patientdetails(){
                                           // console.log(a.value);
                                           var a = document.getElementById('patient-name');
                                           var b = document.getElementById('guardian');
                                           var c = document.getElementById('age');
                                           var d = document.getElementById('lastdate');
                                           var e = document.getElementById('lastdoctor');
                                           var f = document.getElementById('lastpulse');
                                           var g = document.getElementById('lasttemperature');
                                           var h = document.getElementById('lastglucose');
                                           var i = document.getElementById('lastinternalprescription');
                                           var j = document.getElementById('lastsymptoms');
                                           var k = document.getElementById('lastexternalprescription');
                                           var l = document.getElementById('lastdisease');
                                           var m = document.getElementById('lastscans');

                                           var n = document.getElementById('selectdate');

                                           var p = document.getElementById('presentpulse');
                                           var q = document.getElementById('presenttemperature');
                                           var r = document.getElementById('presentglucose');
                                           var s = document.getElementById('presentinternalprescription');
                                           var t1 = document.getElementById('presentsymptoms');
                                           var u = document.getElementById('presentexternalprescription');
                                           var v = document.getElementById('presentdisease');
                                           var w = document.getElementById('presenttest');
                                           var x = document.getElementById('presentheight');
                                           var y = document.getElementById('presentweight');

                                           var xhr = new XMLHttpRequest();
                                           var responseData;
                                           xhr.onload = function(){
                                                responseData = xhr.responseText;
                                                // alert(responseData);
                                                console.log(xhr);
                                                console.log(typeof responseData);

                                                // console.log(responseData);
                                                responseData = JSON.parse(responseData);
                                                console.log(responseData.age);
                                                console.log(responseData);
                                                // console.log(responseData.fullname);

                                                b.value = responseData.guardianname;
                                                c.value = responseData.age;
                                                d.value = responseData.lastappointmentdate;
                                                e.value = responseData.lastappointmentdoctor;
                                                f.value = responseData.lastpulse;
                                                g.value = responseData.lasttemperature;
                                                h.value = responseData.lastglucose;
                                                i.value = responseData.lastinternalprescription;
                                                j.value = responseData.lastsymptoms;
                                                k.value = responseData.lastexternalprescription;
                                                l.value = responseData.lastdisease;
                                                m.value = responseData.lasttest;
                                           }

                                           let requestData = `patientname=${a.value}`;
                                           console.log(requestData);
                                           xhr.open('post','checkup_server.php');
                                           xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');
                                           xhr.send(requestData);
                                      }
                                      function saveme(){
                                            var a = document.getElementById('patient-name');
                                            var b = document.getElementById('guardian');
                                            var c = document.getElementById('age');
                                            var d = document.getElementById('lastdate');
                                            var e = document.getElementById('lastdoctor');
                                            var f = document.getElementById('lastpulse');
                                            var g = document.getElementById('lasttemperature');
                                            var h = document.getElementById('lastglucose');
                                            var i = document.getElementById('lastinternalprescription');
                                            var j = document.getElementById('lastsymptoms');
                                            var k = document.getElementById('lastexternalprescription');
                                            var l = document.getElementById('lastdisease');
                                            var m = document.getElementById('lastscans');

                                            var m2 = document.getElementById('lastheight');
                                            var m3 = document.getElementById('lastweight');
                                            var m4 = document.getElementById('lastdietplan');
                                            var m5 = document.getElementById('guardianrelation');
                                            var m6 = document.getElementById('guardianage');
                                            var m7 = document.getElementById('remarks');
                                            var m8 = document.getElementById('fees');
                                            var m9 = document.getElementById('discount');

                                            var n = document.getElementById('selectdate');
                                            var o = document.getElementById("doctorname");
                                            console.log(o);
                                            var p = document.getElementById('presentpulse');
                                            var q = document.getElementById('presenttemperature');
                                            var r = document.getElementById('presentglucose');
                                            var s = document.getElementById('presentinternalprescription');
                                            var t1 = document.getElementById('presentsymptoms');
                                            var u = document.getElementById('presentexternalprescription');
                                            var v = document.getElementById('presentdisease');
                                            var w = document.getElementById('presenttest');
                                            var x = document.getElementById('presentheight');
                                            var y = document.getElementById('presentweight');
                                            var z = document.getElementById('presentdietplan');
                                            console.log("save");
                                            let xhr = new XMLHttpRequest();
                                            xhr.onload = function(){
                                                let responseData = xhr.responseText;
                                                console.log(responseData);
                                            }
                                            let requestData = `patientname=${a.value}&guardianname=${b.value}&guardianrelation=${m5.value}&guardianage=${m6.value}&age=${c.value}&lastappointmentdate=${d.value}&lastappointmentdoctor=${e.value}&lastpulse=${f.value}&lasttemperature=${g.value}&lastglucose=${h.value}&lastinternalprescription=${i.value}&lastsymptoms=${j.value}&lastexternalprescription=${k.value}&lastdisease=${l.value}&lasttest=${m.value}&lastheight=${m2.value}&lastweight=${m3.value}&lastdietplan=${m4.value}&presentappointmentdate=${n.value}&presentappointmentdoctor=${o.innerHTML}&presentpulse=${p.value}&presenttemperature=${q.value}&presentglucose=${r.value}&presentinternalprescription=${s.value}&presentsymptoms=${t1.value}&presentexternalprescription=${u.value}&presentdisease=${v.value}&presenttest=${w.value}&presentheight=${x.value}&presentweight=${y.value}&presentdietplan=${z.value}&remarks=${m7.value}&fees=${m8.value}&discount=${m9.value}`;
                                            console.log(requestData);
                                            xhr.open('post','save.php');
                                            xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');
                                            xhr.send(requestData);

                                           }
                                      function deleteme(){
                                           console.log("delete");
                                      }

                             </script>
                            <br>
                            <button type="button" name="button" onclick="patientdetails()">CALL PATIENT</button>
                            <span>Father/Mother/Patient</span>
                            <input id="guardian" type="text" name="guardianname">
                            <span>Relation</span>
                            <input id="guardianrelation" type="text" name="guardianrelation">
                            <span>Guardian age</span>
                            <input id="guardianage" type="text" name="guardianage">
                            <span>Patient age</span>
                            <input id="age" type="text" name="age">

                      </div>
                      <div class="bottom-header">
                            <div class="makegrid">
                                    <span>PATIENT HISTORY</span>
                                    <span>Last Appointment Date</span>
                                    <input id="lastdate" type="text" name="lastappointmentdate">
                                    <span>Consulted To</span>
                                    <input id="lastdoctor" type="text" name="lastappointmentdoctor">
                                    <span>Pulse</span>
                                    <input id="lastpulse" type="text" name="lastpulse">
                                    <span>Temperature</span>
                                    <input id="lasttemperature" type="text" name="lasttemperature">
                                    <span>Blood Glucose</span>
                                    <input id="lastglucose" type="text" name="lastglucose">
                                    <span>Height</span>
                                    <input id="lastheight" type="text" name="lastheight">
                                    <span>Weight</span>
                                    <input id="lastweight" type="text" name="lastweight">
                                    <span>Diet Plan</span>
                                    <input id="lastdietplan" type="text" name="lastdietplan">
                            </div>
                            <div class="makegrid">
                                  <span>Prescription(Internal)</span>
                                  <textarea id="lastinternalprescription" name="lastinternalprescription"></textarea>
                            </div>
                            <div class="makegrid">
                                  <span>Symptoms</span>
                                  <textarea id="lastsymptoms" name="lastsymptoms"></textarea>
                            </div>
                            <div class="makegrid">
                                  <span>Prescription(External)</span>
                                  <textarea id="lastexternalprescription" name="lastexternalprescription"></textarea>
                            </div>
                            <div class="makegrid">
                                  <span>Symptons</span>
                                  <textarea name="name"></textarea>
                            </div>
                            <div class="makegrid">
                                  <span>Disease/ss</span>
                                  <textarea id="lastdisease" name="lastdisease"></textarea>
                            </div>
                            <div class="makegrid">
                                  <span>Scans/Laboratory Tests/X-Rays</span>
                                  <textarea id="lastscans" name="lasttest"></textarea>
                            </div>
                      </div>
                </div>
                <div class="admin-buttons">
                      <button type="button" name="add">ADD</button>
                      <button type="button" name="edit">EDIT</button>
                      <button type="button" name="saveme" onclick="saveme()">SAVE</button>
                      <button type="button" name="deleteme" onclick="deleteme()">DELETE</button>
                      <button type="button" name="view">VIEW</button>
                </div>
                <div class="disease">
                      <select id="disease"> <option value="disease">SELECT DISEASE</option> </select>
                      <button type="button" name="button">ADD</button>
                      <button type="button" name="button">REMOVE</button>
                      <textarea id="presentdisease"></textarea>
                </div>
                <div class="internal-prescription">
                      <select id="internalprescription"> <option value="INTERNAL-PRESCRIPTION">INTERNAL PRESCRIPTION</option> </select>
                      <button type="button" name="button" id="addip" onclick="addip()">ADD</button>
                      <button type="button" name="button">REMOVE</button>
                      <textarea id="presentinternalprescription" name="presentinternalprescription"></textarea>
                      <script type="text/javascript">
                              function addip(){
                                  var a = document.querySelectorAll('#internal-dosage input');
                                  // console.log(a[0].value);
                                  for(var i=0;i<=a.length-1;i++){
                                       if(a[i].checked == true){
                                           var content = document.createTextNode(a[i].value+":\n");
                                           document.getElementById('presentinternalprescription').appendChild(content);
                                           a[i].checked = false;
                                       }

                                  }
                              }
                      </script>
                </div>
                <div class="internal-dosage" id="internal-dosage">
                      <input type="checkbox" value="Morning">
                      <span>Morning</span>
                      <input type="checkbox" value="Morning+Evening">
                      <span>Morning+Evening</span>
                      <input type="checkbox" value="Morning+Afternoon+Night">
                      <span>Morning+Afternoon+Night</span>
                      <input type="checkbox" value="Before Meal">
                      <span>Before Meal</span>
                      <input type="checkbox" value="All Night Before Sleep">
                      <span>All Night Before Sleep</span>
                      <input type="checkbox" value="Once a day">
                      <span>Once a day</span>
                </div>
                <div class="checkup">
                      <span>Pulse</span>
                      <input id="presentpulse" type="text" name="presentpulse">
                      <span>Temperature</span>
                      <input id="presenttemperature" type="text" name="presenttemperature">
                      <span>Blood-Glucose</span>
                      <input id="presentglucose" type="text" name="presentglucose">
                      <span>Height</span>
                      <input id="presentheight" type="text" name="presentheight">
                      <span>Weight</span>
                      <input id="presentweight" type="text" name="presentweight">
                      <span>Diet Plan</span>
                      <!-- <input id="presentdietplan" type="text" name="presentdietplan"> -->
                      <textarea id="presentdietplan" rows="8" cols="80"></textarea>
                      <select id="gender" name="gender">
                               <option value="male">Male</option>
                               <option value="female">Female</option>
                      </select>
                      <div>
                            <input type="number" id="activitylevel">
                            <select>
                                    <option>1:BMR</option>
                                    <option>2:Sedentary: little or no exercise</option>
                                    <option>3:Exercise 1-3 times/week</option>
                                    <option>4:Exercise 4-5 times/week</option>
                                    <option>5:Daily exercise or intense exercise 3-4 times/week</option>
                                    <option>6:Intense exercise 6-7 times/week</option>
                                    <option>7:Very intense exercise daily, or physical job</option>
                            </select>
                      </div>
                      <select id="goal">
                               <option value="maintain">maintain</option>
                               <option value="mildlose">mildlose</option>
                               <option value="weightlose">weightlose</option>
                               <option value="extremelose">extremelose</option>
                               <option value="mildgain">mildgain</option>
                               <option value="weightgain">weightgain</option>
                               <option value="extremegain">extremegain</option>
                      </select>
                      <button type="button" name="click" onclick="clickapi()">clickapi</button>
                      <script type="text/javascript">
                               var h11 = document.getElementById('presentheight');
                               var w11 = document.getElementById('presentweight');
                               var a11 = document.getElementById('age');
                               var g11 = document.getElementById('gender');
                               var a1 = document.getElementById('activitylevel');
                               var goal = document.getElementById('goal');
                               var dietplan = document.getElementById('presentdietplan');
                               function clickapi(){
                                     // console.log(g11.value);
                                     const options = {
                                        method: 'GET',
                                        headers: {
                                               'X-RapidAPI-Host': 'fitness-calculator.p.rapidapi.com',
                                               'X-RapidAPI-Key': 'e6c44fed07mshd7b27304ea10adfp140eecjsnabaf179b553b'
                                              }
                                        };
                                    fetch('https://fitness-calculator.p.rapidapi.com/macrocalculator?age='+a11.value+'&gender='+g11.value+'&height='+h11.value+'&weight='+w11.value+'&activitylevel='+a1.value+'&goal='+goal.value, options)
                                    .then(response => response.json())
                                    .then(function(response){
                                         dietplan.value = "BALANCE: "+"carbs: "+response.data.balanced.carbs+"fat: "+response.data.balanced.fat+"protein: "+response.data.balanced.protein+"\n"+"HIGHPROTEIN: "+"carbs: "+response.data.highprotein.carbs+"fat: "+response.data.highprotein.fat+"protein: "+response.data.highprotein.protein+"\n"+"LOWCARBS: "+"carbs: "+response.data.lowcarbs.carbs+"fat: "+response.data.lowcarbs.fat+"protein: "+response.data.lowcarbs.protein+"\n"+"LOWFAT: "+"carbs: "+response.data.lowfat.carbs+"fat: "+response.data.lowfat.fat+"protein: "+response.data.lowfat.protein;
                                         console.log(response);
                                    })
                                    .catch(err => console.error(err));

                               }

                      </script>
                </div>
                <div class="external-prescription">
                      <select id="externalprescription"> <option value="externalprescription">EXTERNAL-PRESCRIPTION</option> </select>
                      <button type="button" name="button" onclick="addxp()">ADD</button>
                      <button type="button" name="button">REMOVE</button>
                      <textarea id="presentexternalprescription" name="presentexternalprescription"></textarea>
                      <script type="text/javascript">
                              function addxp(){
                                  var a = document.querySelectorAll('#external-dosage input');
                                  // console.log(a);
                                  // console.log(a[0].value);
                                  for(var i=0;i<=a.length-1;i++){
                                       if(a[i].checked == true){
                                           var content = document.createTextNode(a[i].value+":\n");
                                           document.getElementById('presentexternalprescription').appendChild(content);
                                           a[i].checked = false;
                                       }
                                  }
                              }
                      </script>
                </div>
                <div class="external-dosage" id="external-dosage">
                      <input type="checkbox" value="Morning">
                      <span>Morning</span>
                      <input type="checkbox" value="Morning+Evening">
                      <span>Morning+Evening</span>
                      <input type="checkbox" value="Morning+Afternoon+Night">
                      <span>Morning+Afternoon+Night</span>
                      <input type="checkbox" value="Before Meal">
                      <span>Before Meal</span>
                      <input type="checkbox" value="All Night Before Sleep">
                      <span>All Night Before Sleep</span>
                      <input type="checkbox" value="Once a day">
                      <span>Once a day</span>
                </div>
                <div class="symptoms">
                      <select id="symptoms"> <option value="symptoms">SYMPTOMS</option> </select>
                      <button type="button" name="button">ADD</button>
                      <button type="button" name="button">REMOVE</button>
                      <textarea id="presentsymptoms" name="presentsymptoms"></textarea>
                </div>
                <div class="tests">
                      <select id="tests"> <option value="tests">TESTS</option> </select>
                      <button type="button" name="button">ADD</button>
                      <button type="button" name="button">REMOVE</button>
                      <textarea id="presenttest" name="presenttest"></textarea>
                </div>
                <div class="final">
                      <span>Remarks</span>
                      <textarea id="remarks" name="remarks"></textarea>
                      <span>Fees</span>
                      <input id="fees" type="text" name="fees">
                      <span>Discount</span>
                      <input id="discount" type="text" name="discount">
                </div>
         </div>
  </body>
</html>
