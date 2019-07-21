function makeSelect() {

    function getText(el) {
      return el.textContent || el.innerText;
    }
    var div, link, links, uls;

    // Use an ID to get the nav.primary element
    var navPrimary = document.getElementById('navPrimary');

    // Create select element and add listener
    var sel = document.createElement('select');
    sel.onchange = function() {
      if (this.selectedIndex > 0) {  // -1 for none selected, 0 is default
        window.location = this.value;
      }
    };

    // Create default option and append to select
    sel.options[0] = new Option('Go to...','');
    sel.options[0].setAttribute('selected','');

    // Create options for the links inside #brdmenu
    div = document.getElementById('brdmenu');
    uls = div.getElementsByTagName('ul');

    for (var i=0, iLen=uls.length; i<iLen; i++) {
      links = uls[i].getElementsByTagName('a');

      for (var j=0, jLen=links.length; j<jLen; j++) {
        link = links[j];
        sel.appendChild(new Option(getText(link), link.href));
      }
    }

    // Add select to page if found navPrimary element
    if (navPrimary) {
      navPrimary.appendChild(sel);
    }
}

window.onload = function() {
	makeSelect();
}