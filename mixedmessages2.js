let adjectives = []
let nouns = []
let verbs = []
let who = []
let data1 = []
let data2 = []
let data3 = []
let data4 = []
const messageBox = document.getElementById('message')
const messageBox2 = document.getElementById('weather')
const messageBox3 = document.getElementById('weather4')
const messageBox4 = document.getElementById('weather2')
const messageBox5 = document.getElementById('weather3')
let responseFromBackend = ''

// eslint-disable-next-line no-unused-vars
async function sendNewWord (theTable, theWord) {
  const formData = new FormData()
  formData.append('table', theTable)
  formData.append('word', theWord)
  const response = await fetch('http://localhost/MixedMessages2/setwords', {
    method: 'POST',
    body: formData
  })
  responseFromBackend = await response.json()
  if (responseFromBackend !== "Don't send empty strings" && responseFromBackend !== 'Duplicate entry') {
    bringData()
  }
  document.getElementById('errorMessage').innerHTML = responseFromBackend
}

function bringData () {
  async function loadData () {
    const response = await fetch('http://localhost/MixedMessages2/getwords')
    return await response.json()
  }

  loadData().then((data) => {
    adjectives = data[0]
    nouns = data[1]
    verbs = data[2]
    who = data[3]
    data1 = data[4]
    data2 = data[5]
    data3 = data[6]
    data4 = data[7]
  }).then(showCurrentWeather).then(calcRandAndShow)
}

function calcRandAndShow () {
  const n = Math.floor(Math.random() * nouns.length)
  const v = Math.floor(Math.random() * verbs.length)
  const a = Math.floor(Math.random() * adjectives.length)
  let n1 = Math.floor(Math.random() * nouns.length)
  while (n1 === n) {
    n1 = Math.floor(Math.random() * nouns.length)
  }
  let a1 = Math.floor(Math.random() * adjectives.length)
  while (a1 === a) {
    a1 = Math.floor(Math.random() * adjectives.length)
  }
  const w = Math.floor(Math.random() * who.length)
  messageBox.classList.add('message')
  messageBox.innerHTML = `${who[w]} ${adjectives[a]} ${nouns[n]} is ${verbs[v]} the ${adjectives[a1]} ${nouns[n1]}`
}

function showCurrentWeather () {
  const cardinal = getCardinalDirection(data1.wind.deg)
  const cardinal2 = getCardinalDirection(data2.wind.deg)
  const cardinal3 = getCardinalDirection(data3.wind.deg)
  const cardinal4 = getCardinalDirection(data4.wind.deg)
  messageBox2.innerHTML = `<h3>Ilm hetkel<br>${new Date(data1.dt * 1000).toLocaleString('et-EE', {
    dateStyle: 'long',
    timeStyle: 'short'
  })}</h3>Asukoht: ${data1.name}<br>(<strong>Kesklinn</strong>)<br><br>${data1.weather[0].description}<br>Pilvisus:  ${data1.clouds.all}%<br><br>P&auml;ike t&otilde;useb:  ${new Date(data1.sys.sunrise * 1000).toLocaleString('et-EE', { timeStyle: 'short' })}<br>P&auml;ike loojub:  ${new Date(data1.sys.sunset * 1000).toLocaleString('et-EE', { timeStyle: 'short' })}<br><br>Temperatuur:  ${data1.main.temp}&#8451<br>Tundub nagu:  ${data1.main.feels_like}&#8451<br>Niiskus:  ${data1.main.humidity}%<br><br>Tuule kiirus:  ${data1.wind.speed} m/s<br>Tuule suund:  ${cardinal}`
  messageBox3.innerHTML = `<h3>Ilm hetkel<br>${new Date(data2.dt * 1000).toLocaleString('et-EE', {
    timeZone: 'Cuba',
    dateStyle: 'long',
    timeStyle: 'short'
  })}</h3>Asukoht: Cuba<br>(<strong>${data2.name}</strong>)<br><br>${data2.weather[0].description}<br>Pilvisus:  ${data2.clouds.all}%<br><br>P&auml;ike t&otilde;useb:  ${new Date(data2.sys.sunrise * 1000).toLocaleString('et-EE', {
    timeZone: 'Cuba',
    timeStyle: 'short'
  })}<br>P&auml;ike loojub:  ${new Date(data2.sys.sunset * 1000).toLocaleString('et-EE', {
    timeZone: 'Cuba',
    timeStyle: 'short'
  })}<br><br>Temperatuur:  ${data2.main.temp}&#8451<br>Tundub nagu:  ${data2.main.feels_like}&#8451<br>Niiskus:  ${data2.main.humidity}%<br><br>Tuule kiirus:  ${data2.wind.speed} m/s<br>Tuule suund:  ${cardinal2}`
  messageBox4.innerHTML = `<h3>Ilm hetkel<br>${new Date(data3.dt * 1000).toLocaleString('et-EE', {
    dateStyle: 'long',
    timeStyle: 'short'
  })}</h3>Asukoht: ${data3.name}<br>(<strong>Mustam&auml;e</strong>)<br><br>${data3.weather[0].description}<br>Pilvisus:  ${data3.clouds.all}%<br><br>P&auml;ike t&otilde;useb:  ${new Date(data3.sys.sunrise * 1000).toLocaleString('et-EE', { timeStyle: 'short' })}<br>P&auml;ike loojub:  ${new Date(data3.sys.sunset * 1000).toLocaleString('et-EE', { timeStyle: 'short' })}<br><br>Temperatuur:  ${data3.main.temp}&#8451<br>Tundub nagu:  ${data3.main.feels_like}&#8451<br>Niiskus:  ${data3.main.humidity}%<br><br>Tuule kiirus:  ${data3.wind.speed} m/s<br>Tuule suund:  ${cardinal3}`
  messageBox5.innerHTML = `<h3>Ilm hetkel<br>${new Date(data4.dt * 1000).toLocaleString('et-EE', {
    dateStyle: 'long',
    timeStyle: 'short'
  })}</h3>Asukoht: ${data4.name}<br>(<strong>Turba</strong>)<br><br>${data4.weather[0].description}<br>Pilvisus:  ${data4.clouds.all}%<br><br>P&auml;ike t&otilde;useb:  ${new Date(data4.sys.sunrise * 1000).toLocaleString('et-EE', { timeStyle: 'short' })}<br>P&auml;ike loojub:  ${new Date(data4.sys.sunset * 1000).toLocaleString('et-EE', { timeStyle: 'short' })}<br><br>Temperatuur:  ${data4.main.temp}&#8451<br>Tundub nagu:  ${data4.main.feels_like}&#8451<br>Niiskus:  ${data4.main.humidity}%<br><br>Tuule kiirus:  ${data4.wind.speed} m/s<br>Tuule suund:  ${cardinal4}`
}

function getCardinalDirection (angle) {
  const directions = ['P&#245;hjast', 'Kirdest', 'Idast', 'Kagust', 'L&otilde;unast', 'Edelast', 'L&auml;&auml;nest', 'Loodest']
  return directions[Math.round(angle / 45) % 8]
}

bringData()
setInterval(calcRandAndShow, 5000)
setInterval(showCurrentWeather, 50000)
