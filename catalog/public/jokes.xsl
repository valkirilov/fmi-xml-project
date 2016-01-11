<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:template match="/">
  <html>
  <head>
     <style>
      table {
        width:90%;
        border:1px solid #e5eff8;
        margin:1em auto;
        border-collapse:collapse;
      }
      th {
        padding: 10px;
        background: #F5F8FA;
      }
      td {
        color:#678197;
        border:1px solid #e5eff8;
        padding:5px;
        text-align:left;
      }
      tr.odd td {
        background:#f7fbff
      }
        tr.odd .column1 {
        background:#f4f9fe;
      }
      .column1 {
        background:#f9fcfe;
      }
     </style>
  </head>
  <body>
  <h2 style="text-align: center">ФМИ Бисери</h2>
    <table border="1">
      <tr>
        <th style="text-align:center">ID</th>
        <th style="text-align:center">Бисер</th>
        <th style="text-align:center">Автор</th>
        <th style="text-align:center">Лекция/Упражнение</th>
        <th style="text-align:center">Дата</th>
        <th style="text-align:center">Повод</th>
        <th style="text-align:center">Цитира</th>
        <th style="text-align:center">Контекст</th>
        <th style="text-align:center">Поука</th>
        <th style="text-align:center">Рейтинг</th>
      </tr>
      <xsl:for-each select="jokes/joke">
      <tr>
        <td><xsl:value-of select="@id"/></td>
        <td><xsl:value-of select="current()"/></td>
        <td><xsl:value-of select="@author"/></td>
        <td><xsl:value-of select="@lecture"/></td>
        <td><xsl:value-of select="@date"/></td>
        <td><xsl:value-of select="@occasion"/></td>
        <td><xsl:value-of select="@quotes"/></td>
        <td><xsl:value-of select="@context"/></td>
        <td><xsl:value-of select="@lesson"/></td>
        <td><xsl:value-of select="@rating"/></td>
      </tr>
      </xsl:for-each>
    </table>
  </body>
  </html>
</xsl:template>
</xsl:stylesheet>

