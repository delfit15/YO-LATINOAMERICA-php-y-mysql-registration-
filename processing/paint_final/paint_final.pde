color fillColor;

float hue;
float sat;
float bright;
float hueWidth;
float hueHeight;
float brushsizeX,brushsizeX2, brushsizeY;
float grosor;

PImage stroke1, stroke2, lapiz, lata, paintbrush;
PImage dibujo; // dibujo final 

boolean pencil=true;
boolean pincel=false;
boolean aerosol=false;


void setup ()
{
  //brushes
  imageMode(CENTER);

  stroke1=loadImage("brush.png");
  stroke2=loadImage("aerosol.png");
  lapiz=loadImage("pencil.png");
  paintbrush=loadImage("paintbrush.png");
  lata=loadImage("lata.png");

  pencil=true;

  size(980, 720, P2D);
  background(255);
  colorMode(HSB);
  smooth();

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

void draw () 
{ 
  
   // barra inferior
  pushStyle();     
  //strokeWeight (2);
  noStroke(); 
  fill (0, 3, 210);
  rect (0, 620, width, 100);
  popStyle();

  // iconos
  pushStyle();
  tint (0);
  image(lapiz, 400, 670, 50, 50);
  image(paintbrush, 500, 670, 50, 50);
  image(lata, 600, 670, 50, 50);
  popStyle();

  //grosor pincel iconos
  pushStyle();
  stroke(0); 
  strokeWeight (20);
  line (20, 700, 80, 700);
  strokeWeight(10);
  line (20, 670, 80, 670);
  strokeWeight(5);
  line (20, 640, 80, 640);
  popStyle();


  // color blanco (goma) y negro cuadrados
  //strokeWeight(3);
  //stroke (0);
  noStroke();
  fill (225);
  rect (140, 645, 50, 50);

 // strokeWeight(3);
 // stroke (0);
  noStroke();
  fill (0);
  rect (210, 645, 50, 50);

  drawHueBar(); // dibujo la barra de colores
  

  //////////// empiezo a dibujar al presionar el mouse

  if (mousePressed==true) 
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
      pushStyle();
      fillColor= 255;
      stroke (fillColor);
      //  line(mouseX, mouseY, pmouseX,pmouseY);
      popStyle();
      
    } else if (mouseX > 210 && mouseY>645 && mouseX< 210+50 && mouseY<645+50) {//negro
      pushStyle();
      fillColor=0;
      stroke (fillColor);
      // line(mouseX, mouseY, pmouseX,pmouseY);
      popStyle();
      
    } 
      
    else if (mouseX > 500 && mouseY>620 && mouseX< 500+40 && mouseY<620+70) {//brush
      aerosol=false;
      pincel=true;
      pencil=false;
    } else if (mouseX > 600 && mouseY>620 && mouseX< 600+40 && mouseY<620+70) {//aerosol
      aerosol=true;
      pincel=false;
      pencil=false;
    } else if (mouseX > 350 && mouseY>620 && mouseX< 400+40 && mouseY<620+70) {//pencil
      aerosol=false;
      pincel=false;
      pencil=true;
    }
    
    
    // al apretar el botón de enviar, se guarda la imagen en carpeta, lista para ser recogida por la basededatos. 
     else if (mouseX > 750 && mouseY>645 && mouseX< 750+190 && mouseY<645+53) {//pencil
         dibujo=get(0, 30, width,590);
        dibujo.save("dibujos/dibujo.png");
        
      }
      
    }
  
  }




void drawHueBar() {
  for (int i=0; i<width; i++) {
    float hue = map(i, 0, width, 0, 255);// declare local variable hue  
    stroke(hue, sat, bright);   

    pushStyle();
    strokeWeight (20);
    rect(i, 0, i, hueHeight);
    popStyle();
  }
}


void mouseDragged() {
   if (pencil==true) {
     strokeWeight(grosor);
    stroke(fillColor);
    line(mouseX, mouseY,  pmouseX, pmouseY);
  }

  if (pincel==true) {
    pencil=false;
    tint (fillColor, 20);
    pushMatrix();
    translate (mouseX, mouseY);
    // rotate (radians(random(0)));
    image(stroke1, 0, 0,  brushsizeX,  brushsizeX2);
    popMatrix();
  }

  if (aerosol==true) {
    pencil=false;
    tint (fillColor, 40);
    pushMatrix();
    translate (mouseX, mouseY);
    // rotate (radians(random(10)));
    image(stroke2, 0, 0,  brushsizeX,  brushsizeX);
    popMatrix();
    
  }
}
