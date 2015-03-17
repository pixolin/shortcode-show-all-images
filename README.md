# shortcode-show-all-images

## English
This Plugin creates a shortcode `[ssai]` that you can use in any post or page of your website. This shortcode runs a function which retrieves all attachments and returns the images in an unordered list. 

The *size* can be set by using the shortcode attribute "size":
`[ssai size="large"]`
`[ssai size="thumbnail"]`

You may also exclude images (like a logo file that you also uploaded to the media library but don't want to show in the list of images) by their ID's. (Hint: to find the ID, simply hover over the images in the media library and look at the link that is shown at the bottom of your browser.) The attribute is "exclude":
`[ssai exclude="7, 22, 32"]`

The images get displayed as gallery and use HTML5 tag `<figure>`, if your theme supports HTML5. By default, the plugin will show images in two columns, but you may set the columns with the attribute columns, e.g.
`[ssai columns="3"]`

Images in the gallery are linked to an attachment page by default. If you want to link them to the media-file instead, please use the attribute `link`: 
`[ssai link="file"]`

It may not surprise you that you can combine the attributes, e.g.
`[ssai size="thumbnail" exclude="7, 22, 32" columns="3" link="file"]`


## German
Dieses Plugin erzeugt einen Textbaustein `[ssai]`, den du in jedem Beitrag oder Seite deiner Website nutzen kannst. Der Textbaustein führt eine Funktion aus, die alle Attachments abruft und die zugehörigen Bilder in einer unsortierten Liste ausgibt.

Die *Größe* kann über das Attribut "size" festgelegt werden:
`[ssai size="large"]`
`[ssai size="thumbnail"]`

Du kannst außerdem Bilder über ihre ID ausschließen (etwa eine Logo-Datei, die du ebenfalls in die Mediathek hochgeladen hast, aber nicht in der Bilderliste zeigen möchtest). (Tip: Um die ID herauszufinden, fahr in der Mediathek mit der Maus über das Bild und schau dir den Link an, der am unteren Rand deines Browsers angezeigt wird.) Das Attribut heißt "exclude":
`[ssai exclude="7, 22, 32"]`

Bilder werden als Galerie angezeigt und verwenden das HTML5-Tag `<figure>`, wenn dein Theme HTML5 unterstützt. Per Voreinstellung zeigt das Plugin Bilder in zwei Spalten, aber du kannst die Spaltenzahl mit Hilfe des Attributs columns wählen, z.B.
`[ssai columns="3"]`

Die Bilder in der Gallerie sind laut Voreinstellung mit der zugehörigen Anhang-Seite verknüpft. Möchtest du statt dessen auf die Mediendatei verlinken, verwende bitte das Attribut `link`: 
`[ssai link="file"]` 

Es mag dich wenig überraschen, dass du die Attribute auch kombinieren kannst, z.B.:
`[ssai size="thumbnail" exclude="7, 22, 32" columns="3" link="file"]`