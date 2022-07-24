<xsl:stylesheet version="1.0"
 xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
 xmlns:xhtml="http://www.w3.org/1999/xhtml">
 <xsl:output omit-xml-declaration="yes" indent="yes"/>
 <xsl:strip-space elements="*"/>

<xsl:template match="/productscontainer">
<html>
<head>
  <title>Dashboard</title>
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

<!-- <div>
<h2><xsl:value-of select="name"/></h2>
</div> -->
<div class="row">
<xsl:for-each select="product">
  <div class="column">
    <div class="content">
                  <xsl:element name="a">
                <xsl:attribute name="href">
                    details.php?id=<xsl:value-of select="@id"/>
                </xsl:attribute>
                <xsl:attribute name="style">
                    color: black;
                    text-decoration: none;
                </xsl:attribute>
                <div class="bs-component">
                    <div class="card mb-3">
                        <xsl:element name="img">
                            <xsl:attribute name="style">
                                min-height: 200px; width: 100%; display: block;
                            </xsl:attribute>
                            <xsl:attribute name="src">
                                <xsl:value-of select="image"/>
                            </xsl:attribute>
                        </xsl:element>
                        <div class="card-body" >
                         <h5 class="card-title"><xsl:value-of select="name" /></h5>

                            <h6 class="card-title"><xsl:value-of select="description" /></h6>
                            <button type="button" style="width:100%;background-color:yellow">
                                More info
                                <span class="glyphicon glyphicon-circle-arrow-right"> </span>
                            </button>
                        </div>
                    </div>
                </div>
    </xsl:element>
    </div>
  </div>
  </xsl:for-each>

  </div>
</html>

</xsl:template>
</xsl:stylesheet>