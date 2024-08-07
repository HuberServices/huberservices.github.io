const express = require('express');
const app = express();
const port = 3000;

// Define the route for /our-policy-conditions
app.get('/our-policy-conditions', (req, res) => {
  res.send(`
    <html>
      <head>
        <title>Our Policy Conditions</title>
      </head>
      <body>
        <h1>Our Policy Conditions</h1>
        <p>Here are the details of our policy conditions...</p>
      </body>
    </html>
  `);
});

// Start the server
app.listen(port, () => {
  console.log(`Server is running on http://localhost:${port}`);
});
