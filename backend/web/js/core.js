/**
 * Scorciatoie tastiera
 */
document.onkeyup = function(e) {
  const key = e.key;
  const code = e.code;

  console.log(code);

  if (code == 'F2') {
    $( "#ricerca_globale" ).focus().trigger('click');
  }
  if (code == 'Enter') {
    e.preventDefault();
  }
  /*
  if (e.which == 77) {
    alert("M key was pressed");
  } else if (e.ctrlKey && e.which == 66) {
    alert("Ctrl + B shortcut combination was pressed");
  } else if (e.ctrlKey && e.altKey && e.which == 89) {
    alert("Ctrl + Alt + Y shortcut combination was pressed");
  } else if (e.ctrlKey && e.altKey && e.shiftKey && e.which == 85) {
    alert("Ctrl + Alt + Shift + U shortcut combination was pressed");
  }
  */
};

/**
 * Accesso alle apps in JS
 */
const apps = {};

const finestre_modali = {
  contratto: null
};

let timer = setTimeout(function() {
	console.log('Hello world!');
}, 1000);
clearTimeout(timer);

// #TODO check
function menuSetup() {
	// delays in milliseconds
	let showDelay = 500, hideDelay = 800;
	// holding variables for timers
	let menuEnterTimer, menuLeaveTimer;
	// get the top-level menu items
	let allMenuItems = document.querySelectorAll('.numcontratto');

	for (let i = 0; i < allMenuItems.length; i++) {
		// triggered when user's mouse enters the menu item
		allMenuItems[i].addEventListener('mouseenter', function() {
			let thisItem = this;
			// clear the opposite timer
			clearTimeout(menuLeaveTimer);
			// hide any active dropdowns
      /*
			for (let j = 0; j < allMenuItems.length; j++) {
				allMenuItems[j].classList.remove('active');
			}
      */
			// add active class after a delay
			menuEnterTimer = setTimeout(function() {
				thisItem.classList.add('active');
        finestre_modali['contratto'].loadContratto(thisItem.dataset.numero);
			}, showDelay);
		});

		// triggered when user's mouse leaves the menu item
		allMenuItems[i].addEventListener('mouseleave', function() {
			let thisItem = this;
			// clear the opposite timer
			clearTimeout(menuEnterTimer);
			// remove active class after a delay
			menuLeaveTimer = setTimeout(function() {
				thisItem.classList.remove('active');
			}, hideDelay);
		});
	}
}

function setCookie(cname, cvalue, exdays) {
  const d = new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  let expires = "expires="+ d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
  let name = cname + "=";
  let decodedCookie = decodeURIComponent(document.cookie);
  let ca = decodedCookie.split(';');
  for(let i = 0; i <ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

/**
 * Funzione per la pulizia dei form 
 */
function resetForm($form) {
  $form.find('input[type=hidden], input:text, input[type=number], input[type=date], input:password, input:file, select, textarea').val('');
  /*
  $form.find('input:radio, input:checkbox')
    .removeAttr('checked').removeAttr('selected');
    */
}

/** Metodo per il caricamento della fattura */
function loadFattura(anno, sezionale, numero) {
  return axios.get(apiUrl + '/fattura?filter[anno_esercizio]=' + anno +'&filter[sezionale]=' + sezionale.toUpperCase() + '&filter[numero]=' + numero);
}
function loadAziendaByCodice(codice) {
  return axios.get(apiUrl + '/cliente/' + codice);
}
function loadContratto(numero) {
  return axios.get(apiUrl + '/contratto?filter[numero]=' + numero);
}
function loadScadenze(anno, sezionale, numero) {
  return axios.get(apiUrl + '/pagamento?filter[tipo]=sca&filter[doc_anno]=' + anno +'&filter[doc_sezionale]=' + sezionale.toUpperCase() + '&filter[doc_numero]=' + numero);
}
function loadComune(comune) {
  return axios.get(apiUrl + '/comune?filter[comune]=' + comune.toUpperCase());
}
function loadCliente(codice) {
  return loadAziendaByCodice(codice);
}
function loadBanca(abi, cab) {
  return axios.get(apiUrl + '/banca?filter[abi]=' + abi + '&filter[cab]=' + cab);
}

// Metodi caricamento informazioni utili
function loadIva(codice) {
  return axios.get(apiUrl + '/iva?filter[codice]=' + codice);
}

// Remove the formatting to get integer data for summation
const intVal = function (i) {
  return typeof i === 'string' ? i.replace(".", "").replace(',', '.').replace(/[\€,]/g, '') * 1 : typeof i === 'number' ? i : 0;
};

const core = {
  iva: loadIva,
  fattura: loadFattura,
  scadenze: loadScadenze,
  contratto: loadContratto,
  comune: loadComune,
  cliente: loadCliente,
  banca: loadBanca
}

function loadModal(event, url, title='', size='') {
    event.preventDefault();
    $('#mainModalLabel').text(title);
    if (size) {
        $('#mainModal .modal-dialog').addClass('modal-' + size);
    }
    $('#modalBody').load( url, function() { $('#mainModal').modal('show'); });
}

const myToastEl = document.getElementById('mainToast')
if (myToastEl) {
  myToastEl.addEventListener('show.bs.toast', event => {
    /*
      const button = event.relatedTarget
      const msg = button.getAttribute('data-bs-msg')
      const when = button.getAttribute('data-bs-when')

      if (msg) {
        let toastBody = myToastEl.querySelector('.toast-body')
        toastBody.innerHTML = msg;
      }
      if (when) {
        let toastWhen = myToastEl.querySelector('#toast-when')
        toastWhen.innerHTML = when;
      }
    */
  })

}

const mainModal = document.getElementById('mainModal')
if (mainModal) {
  mainModal.addEventListener('show.bs.modal', event => {
    /*
    // Button that triggered the modal
    const button = event.relatedTarget
    // Extract info from data-bs-* attributes
    const title = button.getAttribute('data-bs-title')
    // If necessary, you could initiate an AJAX request here
    // and then do the updating in a callback.
    //
    // Update the modal's content.
    const modalTitle = mainModal.querySelector('.modal-title')
    const modalBodyInput = mainModal.querySelector('.modal-body input')

    modalTitle.textContent = `New message to ${recipient}`
    modalBodyInput.value = recipient
    */
  })
}


/**
 * Gestisci eventi legati al caricamento dei file
 */
const attachmentModal = document.getElementById('attachmentModal')
if (attachmentModal) {
  attachmentModal.addEventListener('show.bs.modal', event => {
    // Button that triggered the modal
    const button = event.relatedTarget
    // Extract info from data-bs-* attributes
    const title = button.getAttribute('data-bs-title')

    // Gestisci relazioni
    const contratto_numero = button.getAttribute('data-bs-contratto')
    if (contratto_numero) {
          let modalBodyInput = attachmentModal.querySelector('.modal-body #allegato-contratto_numero')
          modalBodyInput.value = contratto_numero
    }
    const agente_id = button.getAttribute('data-bs-agente_id')
    if (agente_id) {
          let modalBodyInput = attachmentModal.querySelector('.modal-body #allegato-agente_matricola')
          modalBodyInput.value = agente_id
    }
    const backto = button.getAttribute('data-bs-backto')
    if (backto) {
          let modalBodyInputBackto = attachmentModal.querySelector('.modal-body #allegato-back_to')
          modalBodyInputBackto.value = backto
    }
    const modalTitle = attachmentModal.querySelector('.modal-title')
    modalTitle.textContent = title
  });
}


(function($) {
  "use strict"; // Start of use strict

  // Visualizza il menu aperto per la voce di menu selezionata
  const parent = $('#accordionSidebar .collapse-item.active').parent().parent()
    .parent().addClass('show')
    .parent().removeClass('collapsed');

  // Abilita popover globali
  const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
  const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))

  // Mostra avviso cliccando sul pulsante di allegato disattivato
  $('#attachDisabled').on('click', function(evt) {
    evt.preventDefault();
    window.alert("È possibile allegare file dopo il salvataggio.");
  });

  $(document).ready(function() {
    // Modifica tutti gli importi per avere la seconda cifra decimale
    $('.amount').on('change', function() {
      const amount = parseFloat($(this).val());
      if (amount && amount != 0) {
        $(this).val(amount.toFixed(2));
      } 
    }).trigger('change');

    // Pulizia form
    $('button[type="button"].btn-outline-secondary').on('click', function (evt) {
      const form = $(this).closest('form');
      resetForm(form);
      form.submit();
    });

  });

})(jQuery); // End of use strict

document.addEventListener('DOMContentLoaded', menuSetup);


// Popolamento dell'indirizzo Cliente
function popolaIndirizzoCliente(result)
{
  const indirizzoId = selectionTarget.replace('_id', '');
  if (indirizzoId.search('indirizzo')) {
    const indirizzoTargetField = document.getElementById(indirizzoId);
    if (indirizzoTargetField && result.indirizzo) {
      indirizzoTargetField.value = result.indirizzo;
      $('#' + indirizzoId).trigger('change');
    }

    const prefix = indirizzoId.replace('indirizzo', '');

    // Citta
    const cittaTargetField = document.getElementById(prefix + 'citta');
    if (cittaTargetField && result.comune) {
      cittaTargetField.value = result.comune;

      // CAP
      // Carica il comune
      core.comune(result.comune).then(function(response) {
        const capTargetField = document.getElementById(prefix + 'cap');
        if (capTargetField && response && response.data && response.data[0]) {
          capTargetField.value = response.data[0].cap;
        }
      });

    }

    const provinciaTargetField = document.getElementById(prefix + 'provincia');
    if (provinciaTargetField && result.provincia) {
      provinciaTargetField.value = result.provincia;
    }
  }
}

// Popolamento dell'indirizzo Contratto
function popolaIndirizzoContratto(result)
{
  if (!result) {
    return;
  }
  const prefix = 'contratto-indirizzo_';
  $('#' + prefix + 'citta').val(result.comune);
  core.comune(result.comune).then(function(response) {
    if (response && response.data && response.data[0]) {
      $('#' + prefix + 'cap').val(response.data[0].cap);
    }
  });
  $('#' + prefix + 'provincia').val(result.provincia);
}

function HandlePopupResult(result) {
  sharedObject.current = result;

  const idTargetField = document.getElementById(selectionTarget);
  if (idTargetField && result._id) {
    if (result._id && result._id['$oid']) {
      result._id = result._id['$oid']
    }
    idTargetField.value = result._id;
    $('#' + selectionTarget).trigger('change');
  }
  const codiceTargetField = document.getElementById(selectionTarget.replace('_id', '_codice'));
  if (codiceTargetField && result.codice) {
    codiceTargetField.value = result.codice;
    $('#' + selectionTarget.replace('_id', '_codice')).trigger('change');
  }
  const descrizioneIdSelector = selectionTarget.replace('_id', '_descrizione');
  const descrizioneTargetField = document.getElementById(descrizioneIdSelector);
  if (descrizioneTargetField && (result.descrizione || result.ragione_sociale)) {
    if (result.ragione_sociale) {
      result.descrizione = result.ragione_sociale;
    }
    descrizioneTargetField.value = result.descrizione;
    // $('#' + descrizioneIdSelector).trigger('change');

    let title = '';
    if (result.codice) {
      title = result.codice + ' ';
    }
    title = title + result.descrizione;
    $('#' + selectionTarget.replace('_id', '_descrizione')).attr('title', title).trigger('change');
  }

  popolaIndirizzoCliente(result);
  
}