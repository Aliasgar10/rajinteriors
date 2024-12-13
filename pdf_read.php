<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PDF Flipbook</title>
  <link rel="stylesheet" href="style.css">
  <style>
    body {
  font-family: Arial, sans-serif;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  background-color: #f0f0f0;
  margin: 0;
}

.book {
  display: flex;
  position: relative;
  perspective: 1000px;
}

.page {
  width: 400px;
  height: 600px;
  border: 1px solid #ccc;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  margin: 0 5px;
  transform-origin: right center;
  transform: rotateY(0deg);
  backface-visibility: hidden;
}

.controls {
  position: absolute;
  bottom: -50px;
  width: 100%;
  text-align: center;
}

.control {
  margin: 0 10px;
  padding: 10px 20px;
  border: none;
  background-color: #007BFF;
  color: white;
  font-size: 16px;
  cursor: pointer;
  border-radius: 5px;
}

.control:hover {
  background-color: #0056b3;
}

  </style>
</head>
<body>
  <div class="book">
    <canvas id="leftPage" class="page"></canvas>
    <canvas id="rightPage" class="page"></canvas>
    <div class="controls">
      <button id="prev" class="control">Previous</button>
      <button id="next" class="control">Next</button>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.14.305/pdf.min.js"></script>
  <script src="script.js"></script>
  <script>
    const url = 'assets/.pdf'; // Replace with your PDF file path
let pdfDoc = null;
let pageNum = 1;
const canvasLeft = document.getElementById('leftPage');
const canvasRight = document.getElementById('rightPage');
const ctxLeft = canvasLeft.getContext('2d');
const ctxRight = canvasRight.getContext('2d');
const scale = 1.5;

// Load the PDF
pdfjsLib.getDocument(url).promise.then((pdf) => {
  pdfDoc = pdf;
  renderPage();
});

// Render a page
function renderPage() {
  if (pageNum <= pdfDoc.numPages) {
    // Render left page
    pdfDoc.getPage(pageNum).then((page) => {
      const viewport = page.getViewport({ scale });
      canvasLeft.width = viewport.width;
      canvasLeft.height = viewport.height;

      const renderContext = {
        canvasContext: ctxLeft,
        viewport: viewport,
      };
      page.render(renderContext);
    });
  }

  if (pageNum + 1 <= pdfDoc.numPages) {
    // Render right page
    pdfDoc.getPage(pageNum + 1).then((page) => {
      const viewport = page.getViewport({ scale });
      canvasRight.width = viewport.width;
      canvasRight.height = viewport.height;

      const renderContext = {
        canvasContext: ctxRight,
        viewport: viewport,
      };
      page.render(renderContext);
    });
  }
}

// Event listeners for flipping
document.getElementById('prev').addEventListener('click', () => {
  if (pageNum > 1) {
    pageNum -= 2; // Go back two pages
    renderPage();
  }
});

document.getElementById('next').addEventListener('click', () => {
  if (pageNum + 2 <= pdfDoc.numPages) {
    pageNum += 2; // Go forward two pages
    renderPage();
  }
});

  </script>
</body>
</html>

