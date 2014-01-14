@extends('layout')

@section('content')

<style>
    html, body{
        margin:0;
        padding:0;
    }
    .head{
        height:30px;
        width:100%;
        background:#3B5998;
        position:fixed;
        top:0;
        left: 0;
        z-index:1000;
    }
    .main{
        padding:30px 10px 5px;
        max-width:1200px;
        margin:auto;
    }
    .left{
        vertical-align:top;
        width:80%;
        display:inline-block;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        background:#eee;
    }
    .right{
        vertical-align:top;
        width:20%;
        display:inline-block;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        background:#ccc;
    }
</style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script>
    function rightBarControl(){
        var windowHeight = $(window).height();
        var scrollHeight = $(window).scrollTop();
        var rightBarWidth = $('.main').width()*.2 //20% of .main width
        var rightBarHeight = $('.right').outerHeight();
        var rightBarOffset = $('.left').offset().left + $('.left').outerWidth();
        var rightBarTop = 30; //30 because .head is 30px high
        if(windowHeight - 30 < rightBarHeight){ //Again including 30 because of .head
            rightBarTop = windowHeight - rightBarHeight;
        }
        if((windowHeight + scrollHeight) >= rightBarHeight){
            $('.right').css({
                position:'fixed',
                left: rightBarOffset,
                top: rightBarTop,
                width: rightBarWidth
            })
        }
        else{
            $('.right').css({
                position: 'static',
                left: '',
                top: '',
                width: '20%'
            })
        }
    }
    $(window).scroll(rightBarControl); //Run control on window scroll
    $(window).resize(rightBarControl); //Run control on window resize
</script>

<div class="head">
    <!-- HEAD CONTENT GOES HERE -->
</div>
<div class="main">
    <div class="left">
        <!-- LEFT BAR CONTENT GOES HERE -->
        <p>
        Ultrices enim cum. Ridiculus proin, tempor dapibus? Eros tristique ultrices augue, enim porttitor turpis turpis ac nascetur porttitor elementum, elementum! Odio, habitasse! Ut pulvinar nunc porta cum turpis, odio vut penatibus nec in turpis, velit elementum, sed in aliquam ut! Facilisis lundium. Placerat montes quis sagittis quis turpis, pid amet! Et porttitor ac scelerisque, elementum, vel, nisi magna turpis amet porta sociis! Aliquam? Nec ultricies, nisi nec mus lectus parturient auctor in egestas hac odio ac, mattis et pid phasellus! Magna hac in pid, ut ut tincidunt tempor porta enim! Hac lectus rhoncus mid dis, nunc hac in amet? Vel pulvinar aenean placerat a, augue, dignissim mus? Mauris, magnis dolor a? Duis quis sed elit mid ultricies ultricies cras scelerisque? Et, montes aliquet augue sagittis. Magna. Montes magna tristique tortor, placerat porta egestas ultrices proin scelerisque magna porttitor elementum, hac eu porta dictumst non. Ridiculus cursus mid sagittis? Lectus tincidunt non. Aenean nec mauris, penatibus! Augue mauris augue aliquet rhoncus tincidunt etiam lectus facilisis natoque pid, pulvinar. Ultricies, habitasse turpis tristique nunc platea! Et. Risus, hac? Est aliquet hac sit? Auctor, integer. Ac dictumst non velit lacus hac enim ut! Integer enim. Magnis pid magna tortor, etiam parturient integer sed.

        Dignissim, non in, scelerisque, adipiscing a ridiculus arcu porttitor turpis nisi, ac sagittis augue adipiscing elementum a est augue! Amet arcu scelerisque nec! Vut placerat augue cum, integer dolor! Auctor tortor, vut nec, vel et pulvinar adipiscing et integer, pellentesque turpis cras pellentesque adipiscing, placerat nisi. Lectus, scelerisque turpis cum nec ac vel, pid, scelerisque, lundium placerat, rhoncus mid, elementum elementum sed porttitor est cum. Risus, nunc amet augue? Nec duis, porttitor tristique mid magna, pid magna purus, quis, turpis etiam hac turpis in mattis! Mid magna, habitasse? Dis aliquam augue! Turpis nisi? Aliquam placerat placerat proin rhoncus dignissim, cras a placerat! Mattis, ut aliquam, elementum adipiscing elementum ut et nunc, purus quis natoque nisi, ac, risus magna! Dis. Vel phasellus non. Non dis? Augue hac enim integer amet ut? Pulvinar mid, quis tincidunt lundium, nec augue lundium velit. Nisi ac. Est sit? Et, dolor sit? Diam, dis auctor, pid? Egestas porttitor non amet ac! Integer, nec diam placerat duis vel porttitor sed aenean. Arcu augue porta, ac mauris est platea, adipiscing urna porta est. Ultrices hac, in in etiam natoque amet nisi aliquam non mattis, porttitor vut sed magna magnis, risus magna aliquam sociis! Arcu cras. Magnis sed.

        Duis amet? Enim augue in, elementum a pulvinar nascetur, in, dolor, arcu scelerisque placerat ut platea auctor amet scelerisque! Penatibus et augue mid a tristique mauris elementum nec! Integer vel, nisi, et cum, a, eros magnis mauris lacus sit scelerisque integer, a pellentesque penatibus tempor magna et! Sit placerat, massa ridiculus magna sociis porttitor, porta. Tincidunt rhoncus mus ultricies sit facilisis, ridiculus nec. Magnis elementum? Risus adipiscing. Ultricies nunc phasellus sit risus porta aenean! Vel nec ac lundium habitasse dignissim pellentesque pid? Porttitor nec amet montes scelerisque, placerat integer? Nunc cum tortor scelerisque, urna porttitor, velit! Nunc, arcu diam ac ut. Rhoncus placerat proin duis tempor phasellus purus phasellus in mus eros, scelerisque parturient ultrices dictumst massa! Phasellus penatibus duis, turpis sed placerat et. Nec tincidunt scelerisque quis duis? Urna, in ac, penatibus, odio. In mus arcu mattis aliquet augue magna elementum sit, sociis dictumst, turpis mattis amet dapibus! Pulvinar mauris, a augue enim platea, placerat purus. Sed lorem nec ac rhoncus arcu, scelerisque sed amet adipiscing porttitor tortor augue eros magna vel risus vel, porta mauris ac vel lorem facilisis cum in ultrices cum integer proin. Augue phasellus magnis, magna? Amet adipiscing vel pellentesque, enim? Auctor urna phasellus.

        Cum natoque in sit in et placerat porta etiam eros hac placerat cum magna sed, vel enim turpis habitasse, sociis nunc ac porttitor ut turpis duis, dictumst rhoncus elementum? Lectus a elit duis ridiculus cursus, platea enim sociis proin, magna dolor parturient phasellus? Ut pulvinar nec vut! Scelerisque porta. In dignissim sed placerat turpis lundium. Porttitor mus turpis ac! Sit dis tortor? Placerat a penatibus, nunc eros ac a vut, dolor? Eu aliquam scelerisque, risus ultricies augue penatibus vut? Dapibus vel placerat dis. Placerat adipiscing purus phasellus tempor non mus elementum tristique aliquet porttitor augue quis? Placerat in tempor, magna dictumst pulvinar. Tincidunt mattis ut cum odio amet egestas mattis purus, et, habitasse! Cursus, eros. Tempor et enim tristique. Ridiculus sit lundium ridiculus aliquet tincidunt urna duis. Cras. Placerat? Facilisis odio parturient enim porttitor parturient duis ridiculus in placerat adipiscing sagittis penatibus nec est magnis, tortor massa, cum, auctor, nisi purus in magna porta tristique. Pellentesque urna odio vel, penatibus etiam a adipiscing duis rhoncus! Augue, facilisis nec ut urna sed, mattis. Elementum, mid urna lectus duis sit urna? Nec! Nec! Dis sed rhoncus dis urna nisi scelerisque? Sit ut nisi, odio sociis purus vel porta! Vel tincidunt massa.

        Ut scelerisque enim, tempor sit nisi turpis nunc? Pid, dis sagittis dapibus dolor nec nisi. A vel sit ac? Urna enim enim integer cras, sit cum magnis ac magnis nec augue proin cum pulvinar tristique. Integer, elementum et integer! Platea odio? Turpis elementum et hac odio adipiscing? Diam vel pulvinar facilisis rhoncus turpis ac habitasse scelerisque lacus aenean risus, quis! Enim arcu augue habitasse tempor sit egestas? Integer, odio in porttitor. Integer vel dis integer! Natoque lacus magnis, tincidunt aliquam amet pulvinar lectus etiam augue parturient lectus in parturient platea. Porta. Rhoncus augue pulvinar turpis vel elementum placerat! Auctor, dapibus, augue et diam in natoque ridiculus nisi placerat sed, et dictumst et turpis magnis auctor diam integer. Et ac? Sit enim duis arcu, sit diam rhoncus sociis? Natoque pulvinar odio odio mus elementum diam, nisi. Platea dapibus lacus lorem aenean et non! Etiam placerat enim, nisi? Tempor! Auctor ultricies non? Ac, magna lectus? Rhoncus nisi in massa turpis eros sagittis elit sed sed lectus ut! Dolor nunc, sed natoque, et porttitor. Aliquet in ridiculus nec turpis dictumst! Platea sociis rhoncus facilisis risus, augue, dignissim ac lacus ac tincidunt! Lundium, amet, pulvinar nec diam a tristique purus dapibus auctor et.

        A pulvinar mus lectus aliquet vel elementum, nunc tincidunt, enim dictumst amet montes porta magna porta augue elementum ut. Sit hac dignissim auctor, magna ridiculus adipiscing porttitor pellentesque. Ultrices? In tincidunt, non tincidunt, amet cursus! Aliquam proin cum adipiscing? Elementum turpis purus in, eu, tristique amet facilisis! Nunc, est odio integer pellentesque dictumst ultricies aliquam. Placerat enim elementum, auctor cum tincidunt, aenean platea? Et turpis non purus sagittis, velit? Magnis ac ut dapibus? Natoque pulvinar, nunc sagittis in augue. Egestas etiam non, rhoncus nascetur, et, urna ac sit aliquam, cras elit? Pid vel risus elementum! Sagittis tortor cum tortor! Tincidunt sit turpis sed platea arcu natoque cursus vel pulvinar et? Habitasse etiam, mauris non, cras, nunc pulvinar diam dolor, nec velit? Porta elit tempor? Mattis sed augue porttitor et adipiscing diam tristique dignissim purus porta magnis, non, magna quis dis, aenean ut porta mid placerat, ut cursus mauris facilisis sociis urna magna turpis, est etiam aenean quis dapibus dis nunc pulvinar parturient montes tincidunt porta porta turpis scelerisque, parturient. Lorem massa duis auctor, integer turpis? Quis vut adipiscing purus, enim porta, sagittis! Ultrices amet, ut sed integer, est pulvinar, enim tincidunt placerat non! Magnis tincidunt parturient. Dis, diam ultrices.

        Pulvinar purus. Sit, lorem! Lundium. Sed nascetur magnis nisi vut risus, eros nisi lundium. Porta scelerisque ut! Scelerisque magna, pellentesque. Sit elementum mus, proin? Lorem risus arcu vel duis mattis tristique, hac scelerisque augue, ultrices? Pulvinar a duis! Lundium porttitor cum auctor porttitor elementum augue habitasse turpis porttitor habitasse, integer, est in eros? Sed a! Ridiculus, elementum etiam pulvinar elementum auctor pellentesque! Arcu. Scelerisque duis? Arcu amet elementum! Rhoncus nunc mid cras ridiculus augue! Arcu dictumst magna odio lundium vel! A tristique elit, magna lundium tincidunt, et? Penatibus magna, aliquet montes sed magna lacus pellentesque? Tincidunt facilisis mus cum in pulvinar. Sit mus a, tristique et enim. Facilisis. Amet rhoncus in ac non scelerisque turpis dolor! Rhoncus amet, tempor risus ac sed, sed, integer? Elit nisi integer pulvinar, integer velit platea rhoncus auctor porttitor nisi phasellus enim mauris, nascetur ac augue sit urna, dis, in penatibus phasellus lorem nunc! Pid ut, rhoncus tortor amet, lectus lectus sed. Sit eu, porttitor eu non et platea? Facilisis dictumst tortor, eros velit diam, aliquam rhoncus in odio aliquet. Egestas, enim urna, adipiscing? Turpis natoque magna dolor sagittis, amet. Scelerisque adipiscing lundium aliquam pulvinar lacus, porta a lundium, rhoncus purus tortor? Urna pulvinar.

        Risus integer pellentesque! Pulvinar mauris! Aliquam turpis, mattis et, dolor, ut integer dictumst aliquet amet, scelerisque porta est est, ultricies tincidunt porta, tincidunt nascetur enim auctor tincidunt? Augue tempor pid proin lectus est montes aliquet turpis rhoncus adipiscing porta aliquet magnis nisi dictumst aenean eros? Vel magna ac, pulvinar risus platea! Nisi auctor elementum porttitor, elementum turpis ac magna adipiscing ac rhoncus aliquet aliquet aliquet! Amet porttitor? Rhoncus ut? Cras nisi, egestas scelerisque lorem nunc mus turpis arcu, tempor augue ultricies! Rhoncus etiam, adipiscing? Rhoncus sit etiam, cras a enim scelerisque et natoque cursus facilisis. Ut duis in integer amet ridiculus pid augue! Dictumst adipiscing platea, non, sed a purus et, ac cras tristique sed enim aenean? In sagittis, rhoncus! Enim elit placerat vut rhoncus! Elementum, aliquet arcu a elit in arcu, placerat, arcu augue. Egestas pid cum. Ac, pulvinar ultrices, pellentesque scelerisque lorem vut enim. Arcu, elementum placerat pid augue dolor pulvinar natoque augue porttitor et, sociis mus. Auctor nascetur cum urna magna nascetur! Elementum elementum tortor natoque adipiscing diam? Tempor nunc pulvinar et porttitor risus turpis et. Proin tincidunt adipiscing habitasse? In nisi ut et integer mattis, risus diam? Arcu mus aenean cras! Integer sociis mattis nunc.

        Auctor et in. Magna. Diam sociis auctor, ut ultrices et in cursus tortor! Vel augue montes vel magna nascetur a ut urna placerat! Proin hac pid ridiculus sed mus sed phasellus, nascetur ut dis dis tortor non duis augue cum porta turpis est non pellentesque sit vel mauris pulvinar pellentesque porttitor! Magna diam purus nunc, nisi proin odio cum, tristique mus, placerat eros? Phasellus. Tincidunt. Tempor auctor in adipiscing mauris lectus amet a? Nisi est sociis. Arcu integer amet! Amet, amet turpis adipiscing ut in sit sociis augue sociis adipiscing in nunc, nunc cursus. In? Odio velit? Nunc ultricies cras turpis scelerisque lorem aliquet turpis montes lundium dolor sit? Nisi vel purus lundium rhoncus rhoncus odio, sagittis sed integer. Sit sit cras mattis natoque! Tristique quis adipiscing, quis. Risus! Placerat cursus magnis ultricies. Aliquam placerat, rhoncus elit ultricies hac, elementum cursus amet, nec elit eu risus ridiculus, ut parturient? Mattis dignissim, pulvinar augue dignissim lacus eros sociis tincidunt elementum. Nec, hac ut lectus! Scelerisque porttitor massa porttitor. Arcu dictumst. Cras cursus parturient hac nunc aliquam ridiculus pulvinar urna pellentesque? Turpis lacus, placerat a hac! Augue rhoncus ac magna augue mid turpis, tortor diam duis, eros. Rhoncus elit elementum massa.

        Placerat nec ut pulvinar ultricies. Placerat? Ac etiam ac turpis ac enim adipiscing vut enim facilisis sit, odio cursus scelerisque aenean mauris turpis, habitasse dictumst pulvinar. Ut mattis nunc! Ac tristique phasellus, cum pellentesque nascetur! Nec scelerisque tincidunt dolor, proin, elementum pellentesque porta porttitor eu augue aenean. Dapibus nisi, tincidunt ut placerat elementum. Magnis est risus ac adipiscing magnis, eu aenean, amet proin eu, natoque, egestas. Enim, vut proin rhoncus non, magna vel facilisis nisi, rhoncus diam cras mauris? Enim enim turpis porttitor! Rhoncus phasellus in? Diam etiam adipiscing? Mid, nec pulvinar ac, mus ac? Amet cursus elementum egestas. Egestas scelerisque ut elementum? Lorem, augue et augue, nunc eu, ridiculus! Adipiscing cum in mattis, non, magna? Enim, quis porttitor, pid mid adipiscing amet? Et, elementum? Scelerisque. Urna, tortor turpis! Nascetur scelerisque vut elit lectus turpis. In aliquam tempor penatibus habitasse integer porta eros, risus tincidunt turpis nisi scelerisque? Rhoncus montes scelerisque. Lundium, sed turpis! Tincidunt scelerisque, adipiscing aliquet dolor, montes a in velit arcu turpis scelerisque. Odio, phasellus a quis? Est in odio hac! Arcu turpis sed. Aenean lacus sed a etiam enim auctor massa. Habitasse mauris sagittis dis. Ridiculus eros, nec, in, adipiscing. Scelerisque! Vel natoque ut odio.
        </p>
    </div
        ><div class="right">
        <!-- RIGHT BAR CONTENT GOES HERE -->
        Integer sagittis parturient, porta sit velit ridiculus! Habitasse tempor, ut penatibus scelerisque porta integer, sed, mid dolor arcu. Dolor, penatibus cursus pid dapibus a diam, nisi risus nec risus! Hac natoque? Parturient magna urna massa ac sed adipiscing? Dolor dapibus dictumst nunc! Sed pellentesque integer, augue? Porta magna mus urna, tincidunt pulvinar proin amet. Augue in facilisis nec et et. Platea odio etiam non? Cras pulvinar mus penatibus facilisis sociis, tincidunt sit, tincidunt lorem a enim in adipiscing facilisis integer quis porta porta est? Lundium est quis? Mattis odio lectus, diam in et elementum quis lundium, placerat elit turpis facilisis, proin urna, mattis cum dignissim scelerisque turpis ac pulvinar, tortor, habitasse! Sit, sed scelerisque? Rhoncus cum? Cursus nec pulvinar odio.

        Ultricies in egestas duis amet mid habitasse nisi turpis! Augue ultrices massa, egestas scelerisque urna sed nisi, sagittis cursus? Turpis odio, est dictumst, placerat nisi porttitor! Placerat lacus cras, dolor etiam egestas cras tortor, tristique in elit proin phasellus? Rhoncus, placerat tincidunt aenean, sed, aenean urna duis! Placerat magnis porttitor hac eu adipiscing elementum nec odio et nunc. Diam adipiscing enim adipiscing hac ultrices tortor odio nec porta. Hac egestas cras massa amet, nec auctor, scelerisque nisi ultricies amet et egestas massa urna, tincidunt sociis non cursus ut, enim? Lacus magna cum massa enim integer! Tincidunt, augue lacus rhoncus, sit nunc ut aliquam? Rhoncus! Dapibus arcu sit odio scelerisque scelerisque enim integer etiam odio, adipiscing elementum nascetur dolor penatibus.

    </div>
</div>

@stop