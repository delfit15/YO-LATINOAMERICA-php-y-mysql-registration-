
let mapa, circulo;
let imgClone;

//subimos imagen de fondo
function preload() {
  mapa = loadImage('data/mapa.png');
}

function setup() {
  createCanvas(windowWidth, windowHeight);
 
}

function draw() { 
  background(255);
  circulo = createGraphics(mapa.width, mapa.height); //creamos circulo
  circulo.ellipse(mouseX,mouseY, 900); // cuando muevo el mouse, muevo la mascara 
  //creamos la mascara
  ( imgClone = mapa.get() ).mask( circulo.get() ); 

  image(imgClone,0,0);
  drawDemoMask();
  circulo.remove ();
  }
// funcion que dibuja el texto
function drawDemoMask(){
  noStroke();
  textStyle(BOLD);
  textAlign(LEFT);
  fill(255,230);
  textSize(210);
  text("SOY,", 100, height/2.9);
  text("LATINO",100,height/1.65);
  text("AMÉRICA", 100, height/1.15);
}
 
// proceso para mascara
p5.Graphics.prototype.remove = function() {
  if (this.elt.parentNode) {
    this.elt.parentNode.removeChild(this.elt);
  }
  var idx = this._pInst._elements.indexOf(this);
  console.log(this._pInst);
  if (idx !== -1) {
    this._pInst._elements.splice(idx, 1);
  }
  for (var elt_ev in this._events) {
    this.elt.removeEventListener(elt_ev, this._events[elt_ev]);
  }
};

