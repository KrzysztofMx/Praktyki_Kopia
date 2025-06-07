# Podstawowe informacje o Markdown

## Spis tresci

- [Podstawowe informacje o Markdown](#podstawowe-informacje-o-markdown)
  - [Spis tresci](#spis-tresci)
  - [Krotki Wstep](#krotki-wstep)
  - [Naglowki](#naglowki)
  - [Znaki Unicode](#znaki-unicode)
    - [ATX style H3](#atx-style-h3)
  - [Quotes](#quotes)
  - [Emphasis](#emphasis)
  - [Horizontal Rule](#horizontal-rule)
  - [Lists](#lists)
  - [Links](#links)
  - [Obrazy](#obrazy)
  - [Kody listingi](#kody-listingi)
  - [Tabele](#tabele)
  - [Listy](#listy)
  - [Niestandartowy HTML](#niestandartowy-html)
  - [Niestandortowy CSS](#niestandortowy-css)
  - [Rownania](#rownania)
    - [Maxwell's Equations](#maxwells-equations)
  - [Footnote](#footnote)
  - [Additional Resources](#additional-resources)

## Krotki Wstep

Gównym celem powstania języka znaczników *Markdown* było łatwe tworzenie dokumentów używając zwykłego sformatowanego tekstu.

Dokument *Markdown* w porównaniu do *HTML*, jest łatwiejszy w czytaniu i pisaniu jego treści, uzywając prostego edytora tekstu.

Typowa niedoświadczona osoba potrafi zrozumieć tekst napisany makrdown'em nie korzystająć z żadnych graficznych parserów. Może się również go nauczyć i pasać Markdown'y szybciej niż pliki HTML.

Uszczegóławiając, Visual Studio Code używa specyfikacji [CommonMark](http://commonmark.org/) Markdown.

---
wróć do [spisu treści](#spis-tresci)

## Naglowki

Nagłówki (Headers) są definiowane przez symbol '#'.
Jeden '#' tworzy H1, dwa H2, itd.
Nagłówki są automatycznie indeksowane na początku dokumentu.
Przykłady

>     # pierwszy poziom
>     ## drugi poziom
>     ### trzeci poziom
>     #### czwarty poziom
>     ##### piąty poziom
>     ###### szósty poziom

---
wróć do [spisu treści](#spis-tresci)

## Znaki Unicode

```PS
&#9658;
&#767;
&#2400;
```

Wpisanie powyższych kodów tak taki efekt

&#9658;
&#767;
&#2400;

---
wróć do [spisu treści](#spis-tresci)

### ATX style H3

> **TODO**. Create an H4

---
wróć do [spisu treści](#spis-tresci)

## Quotes

Quotes are defined by the  '>' symbol

>>>>>>>     # Foo
> bar
> baz
> aaa
***
> bbb

You can combine a header with a quote.

> # H1 Quote

   > > 1. one
>>
>>     two

1. foo

    ```
    bar
    ```

    baz

    > bam

1. A paragraph

        with two lines.

            indented code

      > A block quote.

> **TODO**. Create an H2 Quote

---
wróć do [spisu treści](#spis-tresci)

## Emphasis

Add emphasis with gwiazdka '*' and podkreślienie '_' tylda '~'
Two before and after (no spaces) a section of texts makes it bold

Przykłady

~~przekreślenie~~ dwie tyldy to przkreślenie

**Bold Text with two asterisks**  (**)
__Bold Text with two underscores__ (__)

One before and after (no spaces) a section of texts makes it bold
    Example

> [!TIP]
> Optional information to help a user be more successful

:::image type="content" source="doc/images/screenshot.png" alt-text="screen shoot":::

*Italicized Text with asterisks*

_Italicized Text with underscores_

You can also put Bold and Italicized text inline by surrounding a group of words.

<!--
    Example

    This text is **bold** and this text is *italicized*
-->

> **TODO**. Create a bold sentence, an italicized sentence, and a sentence with both bold and italicized text inline

wróć do [spisu treści](#spis-tresci)

## Horizontal Rule

A horizontal rule gives a visible line break.  You can create one by putting three or more hypens, asterisks, or underscores (-, *, _).

For what it's worth, I prefer dashes...

>Example

(---)

---

(***)

***

(___)

___

> **WARNING** Create a horizontal rule

wróć do [spisu treści](#spis-tresci)

## Lists

Tworzenie listy nieuporządkowanej  '-', '*', '+',

Example with each

- item

* item

+ item

1. List item one.

    List item one continued with a second paragraph followed by an
    Indented block.

-     ls *.sh
-     mv *.sh ~/tmp

    List item continued with a third paragraph.

1. List item two continued with an open block.

    This paragraph is part of the preceding list item.

    1. This list is nested and does not require explicit item continuation.

       This paragraph is part of the preceding list item.

    2. List item b.

    This paragraph belongs to item two of the outer list.

Create ordered lists using a number prefix

1. item 1
2. item 2
3. item 3
>
1. Item 1
2. Item 2
3. Item 3
   1. Item 3a
   2. Item 3b

> **TODO** Create an unordered list of your 5 favorite TV Shows

> **TODO** Create an ordered list of your top 5 Movies

---
wróć do [spisu treści](#spis-tresci)

## Links

Create a link by surrounding it with angle bracket
<!--
    Example

    <http://www.jamesqquick.com>
-->

[foo]: /url "title"

[foo]

[Foo*bar\]]:my_(url) 'title (with parens)'

[Foo*bar\]]

Create a link with text by surrounding text with brackets, [], and link immediately following with parenthesis ()

It's very easy to make some words **bold** and other words *italic* with Markdown. You can even [link to Google!](http://google.com)

<!--
    Example

    [James Q Quick](http://www.jamesqquick.com)
-->

> **TODO** Create a link to your website, twitter, or github. with no text
>
> **TODO** Create a link with text to your website, twitter, or github

What if you needed to reuse a link several times?  Well, you could copy and paste that link each time.  That means, if you need to update the link, you will have to do it each time its used.  There's a better way!

Create reference style links by defining your link with the a 'key' inside of brackets, colon, space, and the link

<!--
    Example

    [1]: http://jamesqquick.com/
-->

Then use the reference style link by using your text inside of brackets followed by the link 'key' inside of bracket.

<!--
    Example

    [My Website][1]
-->

> **TODO** Create a reference link to your website and reference it three times

You can also link to other locations on your markdown page.  Remember, your MarkDown will get converted to HTML, so you can, in theory, use a anchor tag to link to an element with a specific ID.  You can find an example of this in the list of sections at the top of this document.

When we create a header tag for example, it implicitly creates an id property.

Ex '# Header' becomes `<h1 id="header">Header</h1>`

Names will be converted to ids by replacing spaces with hyphens and uppercase letters with lowercase letters (think css naming convention).

Ex 'Header Info' becomes header-info

> **TODO** Create a link to another part of your page.

---
wróć do [początku](#spis-tresci)

## Obrazy

Defining an image is similar to defining a link, except you prefix it with '!'
*Example*
![James Quick](https://intra-gig2.gig.eu/Content/img/logo_gig_2020.png)

---

Just like links, you can define images by reference in the same format.

Define the reference

Example

[profile]: https://izomap.pl/images/Logo_IZOMAP-RGB.png

Use the reference

Example

![James Quick][profile]

> **TODO** Create a reference link to your profile picture and then reference it.

---
wróć do [spisu treści](#11-spis-tresci)

## Kody listingi

You can do inline code with `backticks` (``)

> **TODO** Display a line of text with inline code

You can do blocks of code by surroung it with 3 backticks (``````)

Example

```
var num = 0;
var num2 = 0;
```

> **TODO** Display a block of code from your favorite language

The above does not give language specific highlighting.  You can specify the programming language immediately following the opening 3 backticks.  You Should see a difference in highliting!

Example Javascript

```javascript
function fancyAlert(arg) {
  if(arg) {
    $.facebox({div:'#foo'})
  }
}
```

Example python

```python
import array

@xw.func
def points_by_ang(ta, C, r, theta, phi, k = 0.0):
    # Orthonormal vectors n, u, <n,u>=0
    # ta = [start angle, end angle, number of points]
    n = ta[2]
    t = np.linspace(ta[0], ta[1], n)
    C = np.array(C[:])
    P = generate_circle_by_angles(t, C, r, theta, phi)
    if k != 0.:
        P += np.random.normal(size=P.shape) * k
    return P
```

Example C#

```c#
using System.Collections.Generic;
using System.ComponentModel;

namespace IntraGIG.RU

{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            int ile_umow = db.RU_Umowy.Count();
            Models.IntraGIG2Entities db = new Models.IntraGIG2Entities();
            // komentarz

            log.AppendText($"CONNECTION: { db.RU_Umowy.Find(1).Przedmiot}\n");

            log.AppendText($"Liczba umów :{ile_umow}\n");
            int licz = 1;
            foreach (Models.RU_Umowy u in db.RU_Umowy)
            {
                if (tboxPrzedmiot.Text != "")
                {
                    if (u.Przedmiot.Contains(tboxPrzedmiot.Text))
                    {
                        log.AppendText($" {licz.ToString().PadLeft(2)} " +
                                       $" Ilość uwag: {u.RU_UwagiUmow.Count()}" +
                        // komentarz
                        if (++licz > 10) break;
                    }
                }
                else
                {
                    log.AppendText($"Wpisz fragmant przedmiot umowy\n");
                    break;
                }
            }
            log.AppendText($"Koniec Przetwarzania\n");
            //db.SaveChanges();
        }
    }
}
```

Example HTML

```html
<div>
    <p>This is an html example</p>
</div>
```

> **TODO** Zapisz blok w Twoim ulubionym języku programowania

---
wróć do [spisu treści](spis-tresci)

## Tabele

Tables are useful for displaying rows and columns of data.  Column headers can be defined in between pipes (|).  Headers are separated from table content with a row of dashes (-) (still separated by pipes), and there must be at least 3 dashes between each header.  The row data follows beneath (still separated by pipes).

Example

|nagłówek   |Header 2   | Header 7    |
|-----------|-----------| ----------- |
|Row 1zxczxczxczxczxc|Row 1 Col 2| Row 1 Col 3 |
|Row 1zxcz|Rasdasdasdow 1 Col 2| Row 1 Col 3 |

    Example

    | Header 1    | Header 2    | Header 3    |
    | ----------- | ----------- | ----------- |
    | Row 1 Col 1 | Row 1 Col 2 | Row 1 Col 3 |

The column definitions and row definitions do not have to have the exact same width sizes, but it would be much more readable.  Notice the output of the following two tables are the same, but the second (the raw markdown) is much more readable.

 Header 1 | Header 2
----------|---------
Loooooooooooooong item 1 | looooooooooong item 2

> **TODO** Create a table with three columns and two rows

You can also align (Center, left, right) the text in a column by using colons (:) in the line breaks between headers and rows.  No colon means the default **left alignment**.  Colons on each side signifies **center alignment**.  And a trailing colon means **right alignment**.

> **TODO** Create a table with three columns, one aligned left, one aligned center, and one aligned right

---
wróć do [początku](#spis-tresci)

## Listy

- [x] @mentions, #refs, [links](#spis-tresci), **formatting**, and <del>tags</del> supported
- [x] list syntax required (any unordered or ordered list supported)
- [x] this is a complete item
- [ ] this is an incomplete item

<!--
    Example

    | Header | Header 1 | Header 2  |
    | ------ | :------: | --------: |
    | Aligned Left | Aligned Center | Aligned Right |
-->

---
wróć do [spisu treści](#spis-tresci)

## Niestandartowy HTML

Ponieważ MarkDown jest automatycznie konwertowany na HTML, możesz dodać surowy kod HTML bezpośrednio do swojego MarkDown'a.

```html
<div style="color:red;">Sample HTML Div</div>
<h1 style="background-color:powderblue;">This is a heading</h1>
<p style="background-color:tomato;">This is a paragraph.</p>
```

utworzy taki wynik

<div style="color:red;">Sample HTML Div</div>
<h1 style="background-color:powderblue;">This is a heading</h1>
<p style="background-color:tomato;">This is a paragraph.</p>

> **TIP** jeżeli jesteś biegły w html dodaj go w razie potrzeby do swojego dokumentu.

---
wróć do [spisu treści](#spis-tresci)

## Niestandortowy CSS

Możesz dodać styk CSS do Twojego dokumentu Markdown You can also add custom CSS to your MarkDown to add additional styling to your document. You can also include CSS by including a style tag.

```html
    <style>
        body {
            color:red;
        }
    </style>
```

> **TODO** If you are comfortable with CSS, give your page some style.

---
wróć do [spisu treści](#spis-tresci)

## Rownania

Obsługa równań za pomocą notacji katex

<https://katex.org/docs/supported.html>

$$a+4 = \frac1{2}$$

$$
\begin{array}{cc}
\nabla \times \vec{\mathbf{B}} -\, \frac1c\, \frac{\partial\vec{\mathbf{E}}}{\partial t} &
= \frac{4\pi}{c}\vec{\mathbf{j}}    \nabla \cdot \vec{\mathbf{E}} & = 4 \pi \rho
\\
\nabla \times \vec{\mathbf{E}}\, +\, \frac1c\, \frac{\partial\vec{\mathbf{B}}}{\partial t} & = \vec{\mathbf{0}}
\\
\nabla \cdot \vec{\mathbf{B}} & = 0
\end{array}
$$

### Maxwell's Equations

equation | description
----------|------------
$\nabla \cdot \vec{\mathbf{B}}  = 0$ | divergence of $\vec{\mathbf{B}}$ is zero
$\nabla \times \vec{\mathbf{E}}\, +\, \frac1c\, \frac{\partial\vec{\mathbf{B}}}{\partial t}  = \vec{\mathbf{0}}$ |  curl of $\vec{\mathbf{E}}$ is proportional to the rate of change of $\vec{\mathbf{B}}$
$\nabla \times \vec{\mathbf{B}} -\, \frac1c\, \frac{\partial\vec{\mathbf{E}}}{\partial t} = \frac{4\pi}{c}\vec{\mathbf{j}}    \nabla \cdot \vec{\mathbf{E}} = 4 \pi \rho$ | _wha?_

![electricity](https://i.giphy.com/Gty2oDYQ1fih2.gif)

$\sqrt{\textcolor{red}{x}} + 1\\
\sqrt  x + 1  \\
\sqrt (x + 1) \\
\sqrt {x + 1}
$

---
wróć do [spisu treści](#spis-tresci)

## Footnote

Here's a sentence with a footnote. [^12]

[^12]: This is the footnote.

drugi sentence with a footnote. [^cdc]

[^cdc]: drugi.

---
wróć do [spisu treści](#spis-tresci)

## Additional Resources

[Markdown Cheat Sheet - Adam P on Github](https://github.com/adam-p/markdown-here/wiki/Markdown-Cheatsheet)
[Daring Fireball Markdown Syntax](https://daringfireball.net/projects/markdown/syntax)
[MarkDown in Visual Studio Code](https://code.visualstudio.com/docs/languages/markdown)
