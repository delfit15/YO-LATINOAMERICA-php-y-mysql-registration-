
// caracteristicas brushes
let hue,sat,bright;
let hueWidth, hueHeight;
let brushsizeX, brushsizeX2, brushsizeY;
let fillColor;
let grosor;

let stroke1, stroke2, lapiz, lata, paintbrush; //imagenes
let dibujo; // dibujo final 

// tipos de brushes
let pencil;
let pincel;
let aerosol;

function preload() { //subimos data
  stroke1=loadImage("data/brush.png");
  stroke2=loadImage("data/aerosol.png");
  lapiz=loadImage("data/pencil.png");
  paintbrush=loadImage("data/paintbrush.png");
  lata=loadImage("data/lata.png");
}

function setup ()
{
  //brushes
  imageMode(CENTER);
  pencil=true;
  pincel=false;
  aerosol=false;

 createCanvas(980, 720, P2D);
 
  background(255);
  colorMode(HSB);
  smooth();
//valores predeterminados
  hue = 0;
  sat = 255;
  bright = 255;
  hueWidth = width/255;
  hueHeight = 20;
  fillColor = color(hue, sat, bright);
  grosor=5;
   strokeWeight(grosor);  
   
   brushsizeX=150;
   brushsizeX2=80;
   brushsizeY=170;

 

};

function draw () 
{ 
  
   // barra inferior
  push();     
  //strokeWeight (2);
  noStroke(); 
  fill (0, 3, 210);
  rect (0, 620, width, 100);
  pop();

  // iconos
  push();
  tint (0);
  image(lapiz, 400, 670, 50, 50);
  image(paintbrush, 500, 670, 50, 50);
  image(lata, 600, 670, 50, 50);
  pop();

  //grosor pincel iconos
  push();
  stroke(0); 
  strokeWeight (20);
  line (20, 700, 80, 700);
  strokeWeight(10);
  line (20, 670, 80, 670);
  strokeWeight(5);
  line (20, 640, 80, 640);
  pop();


  // color blanco (goma) y negro cuadrados

  noStroke();
  fill (225);
  rect (140, 645, 50, 50);

  noStroke();
  fill (0);
  rect (210, 645, 50, 50);



  drawHueBar(); // dibujo la barra de colores
  

  //////////// empiezo a dibujar al presionar el mouse
  // dependiendo en que zona aprete, suceden diferentes cosas (dibujar, cambiar color, modo de lapiz, aerosol o pintura, etc.)
  if (mouseIsPressed===true) 
  {
 
    if (mouseY < hueHeight) { // agarro colores
      hue = map(mouseX, 0, width, 0, 255);
      fillColor = color(hue, sat, bright);
      stroke(fillColor);
      
    }     

   else if (   mouseX > 5 && mouseY>680 && mouseX< 90 && mouseY<700+30) {   
             grosor=90;
             brushsizeX=210;
             brushsizeX2=140;
             brushsizeY=230;
    } 
    else if (  mouseX > 5 && mouseY>670-20 && mouseX< 90 && mouseY<670+30) {
        grosor=20; 
             brushsizeX=150;
             brushsizeX2=80;
             brushsizeY=170;
           
    } 
    else if ( mouseX > 5  && mouseY>640-20 && mouseX< 90 && mouseY<640+30) {   
     grosor=5;   
             brushsizeX=90;
             brushsizeX2=20;
             brushsizeY=110;
    }
    
  
    else if (mouseX > 140 && mouseY>645 && mouseX< 140+50 && mouseY<645+50) { // blanco
      push();
      fillColor= 255;
      stroke (fillColor);
    
      pop();
      
    } else if (mouseX > 210 && mouseY>645 && mouseX< 210+50 && mouseY<645+50) {//negro
      push();
      fillColor=0;
      stroke (fillColor);
    
      pop();
      
    } 
      
    else if (mouseX > 500 && mouseY>620 && mouseX< 500+40 && mouseY<620+70) {//brush
      aerosol=false;
      pincel=true;
      pencil=false;
    } 
    
    else if (mouseX > 600 && mouseY>620 && mouseX< 600+40 && mouseY<620+70) {//aerosol
      aerosol=true;
      pincel=false;
      pencil=false;
    } 
    
    else if (mouseX > 350 && mouseY>620 && mouseX< 400+40 && mouseY<620+70) {//pencil
      aerosol=false;
      pincel=false;
      pencil=true;
    }
    
      
    }
  
  }

// barra de colores
function drawHueBar() {
  for (let i=0; i<width; i++) {
    let hue = map(i, 0, width, 0, 255);// declare local variable hue  
    stroke(hue, sat, bright);   

    push();
    strokeWeight (20);
    rect(i, 0, i, hueHeight);
    pop();
  }
}

//funcion para dibujar
function mouseDragged() {
   if (pencil==true) {
     strokeWeight(grosor);
    stroke(fillColor);
    line(mouseX, mouseY,  pmouseX, pmouseY);
  }

  if (pincel==true) { //modo pincel
    pencil=false;
    tint (fillColor, 20);
    push();
    translate (mouseX, mouseY);
    image(stroke1, 0, 0,  brushsizeX,  brushsizeX2);
    pop();
  }

  if (aerosol==true) { //modo aerosol
    pencil=false;
    tint (fillColor, 40);
    push();
    translate (mouseX, mouseY);
    image(stroke2, 0, 0,  brushsizeX,  brushsizeX);
    pop();
 
  }
}