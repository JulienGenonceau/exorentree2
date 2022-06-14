import jsPDF from './path/to/jspdf/jspdf.mjs'
import './path/to/jspdf-autotable/jspdf-autotable.mjs'


// Default export is a4 paper, portrait, using millimeters for units
const doc = new jsPDF();

doc.text("Hello world!", 10, 10);
doc.save("a4.pdf");
