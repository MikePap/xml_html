<?xml version="1.0"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="/review">
  <html>
    <head>
      <style type="text/css">
      body {
        font-size: 12pt;
      }
      
      h2 {
        font-weight: bolder;
        font-size: 16pt;
        color: black; 
      }
      
      .teaser {
        background-color: silver;
        font-face: "Trebuchet";
        font-style: italic;
        margin-left: 25px;
        padding: 4px;
      }
      
      .body {
        border: ridged 1px;
        line-height: 2em;
        margin-top: 15px;
        padding: 20px;
      }
      
      .special {
        background-color: silver;
        color: red;
        font-weight: bolder;
        padding: 5px;
      }
      </style>  
    </head>
    <body>
      <xsl:apply-templates select="title"/>
      <xsl:apply-templates select="teaser"/>
      <xsl:apply-templates select="body"/>
      <xsl:apply-templates select="cast"/>
      <br />
      <xsl:apply-templates select="director"/>
    </body>
  </html>
  </xsl:template>

  <xsl:template match="title">
    <h2><xsl:value-of select="." /></h2>
  </xsl:template>
  
  <xsl:template match="teaser">
    <span class="teaser"><xsl:value-of select="." /></span>
  </xsl:template>
  
  <xsl:template match="director">
    <span class="special">Director:  <xsl:value-of select="." /> </span>
  </xsl:template>
  
  <xsl:template match="cast">
    <span class="special">Cast: 
      <xsl:apply-templates />
    </span>
  </xsl:template>
  
  <xsl:template match="person[position() != last()]">
    <xsl:value-of select="." />,
  </xsl:template>
  
  <xsl:template match="person[position() = (last()-1)]">
    <xsl:value-of select="." />
  </xsl:template>
  
  <xsl:template match="person[position() = last()]"> and <xsl:value-of select="." />
  </xsl:template>
  
  <xsl:template match="body">
    <div class="body"><xsl:apply-templates/></div>
  </xsl:template>
</xsl:stylesheet>


