<xsl:stylesheet version="1.0"
 xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
 xmlns:xhtml="http://www.w3.org/1999/xhtml">
 <xsl:output omit-xml-declaration="yes" indent="yes"/>
 <xsl:strip-space elements="*"/>

<xsl:template match="/usercontainer">
<html>
<head>
  <title>Details</title>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>

<style type='text/css'>
* {
  box-sizing: border-box;
}

body {
  background-color: #f1f1f1;
  padding: 20px;
  font-family: Arial;
}

/* Center website */
.main {
  max-width: 1000px;
  margin: auto;
}

h1 {
  font-size: 50px;
  word-break: break-all;
}

.row {
  margin: 8px -16px;
}

/* Add padding BETWEEN each column */
.row,
.row > .column {
  padding: 8px;
}

/* Create four equal columns that floats next to each other */
.column {
  float: left;
  width: 25%;
}

/* Clear floats after rows */ 
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Content */
.content {
  background-color: white;
  padding: 10px;
}

/* Responsive layout - makes a two column-layout instead of four columns */
@media screen and (max-width: 900px) {
  .column {
    width: 50%;
  }
}

/* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
  }

}
</style>
</head>

<div class="row">
  <div class="column">
    <div class="content">
           <table>
           <thead>
           <tr>
           <td>Username</td>
           <td>Firstname</td>
           <td>Lastname</td>
           <td>Email</td>
           <td>Phone</td>
           <td><Address></Address></td>
           </tr>
           </thead>
           <tbody>
           <xsl:for-each select='user'>
           <tr>
           <td><xsl:value-of select="username"/></td>
           <td><xsl:value-of select="firstname"/></td>
           <td><xsl:value-of select="lastname"/></td>
          <td><xsl:value-of select="email"/></td>
           <td><xsl:value-of select="phone"/></td>
           </tr>
           </xsl:for-each>
           </tbody>
           </table>
    </div>
  </div>
  </div>

</html>

</xsl:template>
</xsl:stylesheet>