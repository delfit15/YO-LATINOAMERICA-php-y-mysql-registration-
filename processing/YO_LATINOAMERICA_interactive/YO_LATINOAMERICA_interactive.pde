

// mascaras
PGraphics mask;
PGraphics maskCircle;

PImage mapa;
int WHITE=color(255);
int BLACK=color(0);
PFont Font1;

void setup(){
size(1920,1080);
Font1 = createFont("Montserrat-Black.ttf", 300); //importo fuente
mapa=loadImage("mapa_yo.png");
noStroke();
drawDemoMask(); 
};

void draw() {
  background(WHITE);
    maskCircle = createGraphics(width, height); //creo mascara 
    maskCircle.beginDraw();
 
    maskCircle.ellipse(0, map(mouseY,0,400, 0,height), 10000, 900); // cuando muevo el mouse entre 0 y 400, lleno las letras con la mascara
   
    maskCircle.endDraw();
    mapa.mask(maskCircle); //enmascaro imagen de mapa
    image(mapa,0,0); 
    maskPixels();
}

void drawDemoMask() { // texto
  mask = createGraphics(width, height);
  mask.beginDraw();
  mask.background(0);
  mask.textAlign(LEFT);
  mask.textFont(Font1);
  mask.text("YO,", 100, 400);
  mask.text("LATINO",100,710);
  mask.text("AMÉRICA", 100, 1030);
  mask.endDraw();
  mask.loadPixels();
}

void maskPixels() { // comparo pixeles negros y blancos
  loadPixels();
  for (int i=0; i < mask.pixels.length; ++i) {
    int maskPixel = mask.pixels[i];
    if (maskPixel != WHITE) {
      pixels[i] = BLACK;
    }
  }
  updatePixels();
}
