<html>
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    </script>
    <style>
      body {
  background-color: #000;
  margin: 0px;
  overflow: hidden;
  color: red;
  text-align: center;
}

a {
  color: yellow;
}
a:hover{
  color: red;
}

#container {
  position: absolute;
  top: 0;
  z-index: -1;
  width: 100%;
  height: 100%;
}
    </style>
  </head>
  <body>
    <script src="//unpkg.com/d3-array"></script>
      <script src="//unpkg.com/d3-scale"></script>

      <script src="//unpkg.com/three"></script>
  <script src="//unpkg.com/globe.gl"></script>
  <!--<script src="../../dist/globe.gl.js"></script>-->
<!--<div>
  <p style="color: white;">helo woldddddddddddd</p>
</div>
<div id="confirm"><div class="message">This is a warning message.</div>
<button class="yes">OK</button>
<img id="you"  src = d.img , 
             width="120" height="70"/>
</div> -->
  

  <div id="globeViz"><p>lelel</p></div>
    <script>
       
        /* function functionAlertd(msg, myYes,) {
            var confirmBox = $("#confirm");
            confirmBox.find(".message").text(msg);
            confirmBox.find(".yes").unbind().click(function() {
               confirmBox.hide();
            });
            var el = document.getElementById("you");
            el.scr = go; 
            confirmBox.find(".yes").click(myYes);
            confirmBox.show();
         } */
        



  const colorScale = d3.scaleOrdinal(['orangered', 'mediumblue', '#00FF00', 'yellow']);

  const labelsTopOrientation = new Set(['Apollo 12', 'Luna 2', 'Luna 20', 'Luna 21', 'Luna 24', 'LCROSS Probe']); // avoid label collisions

  const elem = document.getElementById('globeViz');
  const moon = Globe()
    .globeImageUrl('//i.ibb.co/fGkNcgY/83-FC9-C9-C-DD92-4-F16-8-DCF-982-EDE09-CDB9.png')
    .bumpImageUrl('https://i.ibb.co/TBJ1z2c/85-C09-A87-A87-F-4-FCF-A148-71828-F5-ABDBD.png')
    .backgroundImageUrl('https://dl.dropbox.com/s/vzomkozv7ppv17q/Space.jpg')
    .showGraticules(true)
    .showAtmosphere(true) // moon has no atmosphere
    .labelText('label')
    .labelSize(1.0)
    .labelDotRadius(0.4)
    .labelDotOrientation(d => labelsTopOrientation.has(d.label) ? 'top' : 'bottom')
    .labelColor(d => colorScale(d.agency))
    .labelLabel(d =>
                `
        <div style="color:yellow;text-shadow: 5px 5px 10px black;"><b>${d.label}</b></div>
        <div style="color: yellow;text-shadow: 5px 5px 10px black; font-weight: bold;">${d.program} Program</div>
        <div style="color: yellow;text-shadow: 5px 5px 10px black; font-weight: bold;">${d.info}</div>
        <div style="color: orange;text-shadow: 5px 5px 10px black; font-weight: bold;">${d.mag}</div>
        <div style="color: orange;text-shadow: 5px 5px 10px black; font-weight: bold;">${d.dep}</div>
        <div><img scr="https://i.ibb.co/TBJ1z2c/85-C09-A87-A87-F-4-FCF-A148-71828-F5-ABDBD.png" /></div>
        <div style="color: orange;text-shadow: 5px 5px 10px black; font-weight: bold;">${d.date}</div>
        <div style="color: yellow;text-shadow: 5px 5px 10px black;"><i>${new Date(d.date).toLocaleDateString()}</i></div>
      `)
      //.onLabelClick(d => functionAlert(d.date))
    .onLabelClick(d => window.open(d.url, '_blank'))
    //.onLabelClick(d => {var el = document.getElementById("myimg"); var els = $d.img})
    (elem);
     
  fetch('jso.json') // make the request to fetch https://raw.githubusercontent.com/eesur/country-codes-lat-long/e20f140202afbb65addc13cad120302db26f119a/country-codes-lat-long-alpha3.json

  // fetch('https://raw.githubusercontent.com/eesur/country-codes-lat-long/e20f140202afbb65addc13cad120302db26f119a/country-codes-lat-long-alpha3.json')
    .then(r => r.json()) //then get the returned json request header if and when the request value returns true
    .then(landingSites => { // then use the request result as a callback
    console.log(landingSites)
    // moon.labelsData(landingSites.ref_country_codes);
    moon.labelsData(landingSites);
    console.log(moon.labelLabel)



   /* const pin = new THREE.Mesh(
                        new THREE.SphereBufferGeometry(2,20,20),
                        new THREE.MeshBasicMaterial({color: 0xff0000})
                  );
                  
                 var point1 = {
                        lat: 0.6737,
                        lng: 23.47295,
                        
                 }
                 
                 function calpos(lat,lng) {
                        var phi = (90-lat)*(Math.PI/180);
                        var theta = (lng+180)*(Math.PI/180);
                        let x = -(Math.sin(phi)*Math.cos(theta));
                        let z = (Math.sin(phi)*Math.sin(theta));
                        let y = (Math.cos(phi));
                        return {x,y,z};
                 }
                 
                 
                 let pos = calpos(point1);
                 
                 //pin.position.set(pos.x,pos.y,pos.z);
                  pin.position.set(1,0,0);
                  scene.add(pin);








                  const earth = Globe()
    .globeImageUrl('//i.ibb.co/fGkNcgY/83-FC9-C9-C-DD92-4-F16-8-DCF-982-EDE09-CDB9.png')
    .bumpImageUrl('https://i.ibb.co/TBJ1z2c/85-C09-A87-A87-F-4-FCF-A148-71828-F5-ABDBD.png')
    .backgroundImageUrl('https://dl.dropbox.com/s/vzomkozv7ppv17q/Space.jpg')
    .showGraticules(true)
    .showAtmosphere(true); // moon has no atmosphere 


    const earthMaterial = earth.globeMaterial();
    globeMaterial.bumpScale = 10;
    new THREE.TextureLoader().load('//unpkg.com/three-globe/example/img/earth-water.png', texture => {
      globeMaterial.specularMap = texture;
      globeMaterial.specular = new THREE.Color('grey');
      globeMaterial.shininess = 15;
    });
    earth.scene();*/




    // custom globe material
    const globeMaterial = moon.globeMaterial();
    globeMaterial.bumpScale = 10;
    new THREE.TextureLoader().load('//unpkg.com/three-globe/example/img/earth-water.png', texture => {
      globeMaterial.specularMap = texture;
      globeMaterial.specular = new THREE.Color('grey');
      globeMaterial.shininess = 15;
    });

    setTimeout(() => { // wait for scene to be populated (asynchronously)
      const directionalLight = moon.scene().children.find(obj3d => obj3d.type === 'DirectionalLight');
      directionalLight && directionalLight.position.set(1, 1, 1); // change light position to see the specularMap's effect
    });
      
  }); 

  //moon.controls().autoRotate = false;
  //moon.controls().autoRotateSpeed = 0.85;

  //const animate = () => {
      //requestAnimationFrame(animate);
          //moon.rotation.y += 0.01;
    //}

  //animate();  

    </script>
  </body>
</html>
