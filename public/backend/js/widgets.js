$(function(){
  'use strict';

  $('.sparkline1').sparkline('html', {
    type: 'bar',
    barWidth: 5,
    height: 50,
    barColor: '#0083CD',
    chartRangeMin: 0,
    chartRangeMax: 10
  });

  $('.sparkline2').sparkline('html', {
    type: 'bar',
    barWidth: 5,
    height: 50,
    barColor: '#fff',
    lineColor: 'rgba(255,255,255,0.5)',
    chartRangeMin: 0,
    chartRangeMax: 10
  });

  var r1 = new Rickshaw.Graph({
    element: document.querySelector('#rickshaw1'),
    renderer: 'line',
    max: 100,
    series: [{
      data: [
        { x: 0, y: 40 },
        { x: 1, y: 49 },
        { x: 2, y: 38 },
        { x: 3, y: 30 },
        { x: 4, y: 32 },
        { x: 5, y: 40 },
        { x: 6, y: 20 },
        { x: 7, y: 10 },
        { x: 8, y: 20 },
        { x: 9, y: 25 },
        { x: 10, y: 35 },
        { x: 11, y: 20 },
        { x: 12, y: 40 },
        { x: 13, y: 25 }
      ],
      color: '#0866C6'
    }]
  });
  r1.render();

  // Responsive Mode
  new ResizeSensor($('.sl-mainpanel'), function(){
    r1.configure({
      width: $('#rickshaw1').width(),
      height: $('#rickshaw1').height()
    });
    r1.render();
  });

  var r2 = new Rickshaw.Graph({
    element: document.querySelector('#rickshaw2'),
    renderer: 'line',
    max: 100,
    series: [{
      data: [
        { x: 0, y: 40 },
        { x: 1, y: 49 },
        { x: 2, y: 38 },
        { x: 3, y: 30 },
        { x: 4, y: 32 },
        { x: 5, y: 40 },
        { x: 6, y: 20 },
        { x: 7, y: 10 },
        { x: 8, y: 20 },
        { x: 9, y: 25 },
        { x: 10, y: 35 },
        { x: 11, y: 20 },
        { x: 12, y: 40 },
        { x: 13, y: 25 }
      ],
      color: '#23BF08'
    }]
  });
  r2.render();

  // Responsive Mode
  new ResizeSensor($('.sl-mainpanel'), function(){
    r2.configure({
      width: $('#rickshaw2').width(),
      height: $('#rickshaw2').height()
    });
    r2.render();
  });

  var r3 = new Rickshaw.Graph({
    element: document.querySelector('#rickshaw3'),
    renderer: 'line',
    max: 100,
    series: [{
      data: [
        { x: 0, y: 40 },
        { x: 1, y: 49 },
        { x: 2, y: 38 },
        { x: 3, y: 30 },
        { x: 4, y: 32 },
        { x: 5, y: 40 },
        { x: 6, y: 20 },
        { x: 7, y: 10 },
        { x: 8, y: 20 },
        { x: 9, y: 25 },
        { x: 10, y: 35 },
        { x: 11, y: 20 },
        { x: 12, y: 40 },
        { x: 13, y: 25 }
      ],
      color: '#6F42C1'
    }]
  });
  r3.render();

  // Responsive Mode
  new ResizeSensor($('.sl-mainpanel'), function(){
    r3.configure({
      width: $('#rickshaw3').width(),
      height: $('#rickshaw3').height()
    });
    r3.render();
  });

  new Morris.Bar({
    element: 'morris1',
    data: [
      { y: '2006', a: 100, b: 90, c: 80 },
      { y: '2007', a: 75,  b: 65, c: 75 },
      { y: '2008', a: 50,  b: 40, c: 45 },
      { y: '2009', a: 75,  b: 65, c: 85 },
    ],
    xkey: 'y',
    ykeys: ['a', 'b', 'c'],
    labels: ['Series A', 'Series B', 'Series C'],
    barColors: ['#7CBDDF','#5B93D3','#384250'],
    gridTextSize: 11,
    hideHover: 'auto',
    resize: true
  });

  new Morris.Bar({
    element: 'morris2',
    data: [
      { y: '2006', a: 100, b: 90, c: 80 },
      { y: '2007', a: 75,  b: 65, c: 75 },
      { y: '2008', a: 50,  b: 40, c: 45 },
      { y: '2009', a: 75,  b: 65, c: 85 },
      { y: '2010', a: 65,  b: 60, c: 60 },
      { y: '2011', a: 45,  b: 40, c: 50 },
      { y: '2012', a: 50,  b: 55, c: 40 },
      { y: '2013', a: 55,  b: 60, c: 65 }
    ],
    xkey: 'y',
    ykeys: ['a', 'b', 'c'],
    labels: ['Series A', 'Series B', 'Series C'],
    barColors: ['#7CBDDF','#5B93D3','#384250'],
    stacked: true,
    gridTextSize: 11,
    hideHover: 'auto',
    resize: true
  });

});
