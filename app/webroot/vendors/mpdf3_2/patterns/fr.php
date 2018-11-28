<?php
/*
	Adapted from Hyphenator 1.0.2
	http://code.google.com/p/hyphenator/
	
	Retrieved from http://extensions.services.openoffice.org/project/french-dictionary-reform1990
	License: LGPL
*/

$patterns="'a1b2r 'a1g2n 'a1mi 'a1na 'a1po 'a2g3nat 'a4 'ab1ré 'ab3réa 'ae3s4c2h 'ag1na 'ami1no 'amino1a2c 'an1ti 'ana3s4t2r 'anti1a2 'anti1e2 'anti1s2 'anti1é2 'anti2en1ne 'apo2s3ta 'ar1ge 'ar1pe 'ar3gent_ 'ar3pent_ 'as2ta 'e1n1a2 'e1n1o2 'e4 'eu2r1a2 'i1g2n 'i1n1a2 'i1n1e2 'i1n1i2 'i1n1o2 'i1n1u2 'i1n1é2 'i2g3ni 'i2g3né 'i2g4no 'i4 'in1s2tab 'in1te 'in2a3nit 'in2augur 'in2effab 'in2ept 'in2er 'in2exo1ra 'in2i3mi1ti 'in2i3q 'in2i3t 'in2o3cul 'in2ond 'in2u3l 'in2uit 'in2é3luc1ta 'in2é3nar1ra 'ina1ni 'inau1gu 'inef1fa 'ini1mi 'ino1cu 'ins1ta 'inte1ra2 'inte1re2 'inte1ri2 'inte1ro2 'inte1ru2 'inte1ré2 'inte4r3 'inters2 'iné1lu 'iné1na 'o1vi 'o4 'on1gu 'on3guent_ 'oua1ou 'ovi1s2c 'u4 'y4 'â4 'è4 'é4 'ê4 'î4 'ô4 'û4 _1ba _1bi _1c2h4 _1ci _1co _1cu _1da _1di _1do _1dy _1dé _1dé3s2o3dé _1ge _1k2h4 _1la _1ma _1mi _1mo _1mé _1no _1p2h4 _1p2l _1p2r _1p2sy1c2h _1pa _1pe _1po _1pu _1pé _1re _1ré _1s2c2h4 _1s2h4 _1sa _1se _1so _1su _1sy _1t2h4 _1t2r _1ta _a1b2r _a1g2n _a1mi _a1na _a1po _a2g3nat _a4 _ab1ré _ab3réa _ae3s4c2h _ag1na _ami1no _amino1a2c _an1ti _ana3s4t2r _anti1a2 _anti1e2 _anti1s2 _anti1é2 _anti2en1ne _apo2s3ta _ar1de _ar1ge _ar1pe _ar3dent_ _ar3gent_ _ar3pent_ _as2ta _bai1se _bai2se3main _baise1ma _bi1a2c _bi1a2t _bi1au _bi1u2 _bi2s1a2 _bio1a2 _c2hè _chè1v2r _chè2vre3feuil1le _chèv1re _chèvre1fe _chèvrefeuil2l _ci1sa _ci2s1alp _co1o2 _co2o3lie _com1me _com3ment_ _con1t2r _con4 _cons4 _cont1re _cont1re3maît1re _contre1ma _contre1s2c _contremaî1t2r _coo1li _cul4 _da1c2r _dac1ry _dacryo1a2 _di1a2cid _di1a2cé _di1a2mi _di1a2tom _di1ald _di1e2n _di2s3h _dia1ci _dia1to _do1le _do3lent_ _dy2s1a2 _dy2s1i2 _dy2s1o2 _dy2s1u2 _dy2s3 _dé1a2 _dé1io _dé1o2 _dé1sa _dé1se _dé1so _dé1su _dé2s _dé2s1i2 _dé2s1u2n _dé2s1½ _dé2s1é2 _dé3s2a3c2r _dé3s2a3tell _dé3s2as1t2r _dé3s2c _dé3s2ensib _dé3s2ert _dé3s2exu _dé3s2i3d _dé3s2i3g2n _dé3s2i3li _dé3s2i3nen _dé3s2i3r _dé3s2in1vo _dé3s2ist _dé3s2o3l _dé3s2o3pil _dé3s2orm _dé3s2orp _dé3s2ou1f2r _dé3s2p _dé3s2t _dé3s2é3g2r _dés2a3m _désa1te _désen1si _dési1ne _déso1pi _e1n1a2 _e1n1o2 _e4 _eu2r1a2 _gem1me _gem2ment_ _i1g2n _i1n1a2 _i1n1e2 _i1n1i2 _i1n1o2 _i1n1u2 _i1n1é2 _i2g3ni _i2g3né _i2g4no _i4 _in1s2tab _in1te _in2a3nit _in2augur _in2effab _in2ept _in2er _in2exo1ra _in2i3mi1ti _in2i3q _in2i3t _in2o3cul _in2ond _in2u3l _in2uit _in2é3luc1ta _in2é3nar1ra _ina1ni _inau1gu _inef1fa _ini1mi _ino1cu _ins1ta _inte1ra2 _inte1re2 _inte1ri2 _inte1ro2 _inte1ru2 _inte1ré2 _inte4r3 _inters2 _iné1lu _iné1na _la1te _la3tent_ _ma1c2r _ma1g2n _ma1la _ma1le _ma1li _ma1lo _ma2c3k _ma2g3nici1de _ma2g3nificat _ma2g3num _ma2l1a2d1ro _ma2l1a2dres _ma2l1a2v _ma2l1ai1sé _ma2l1ap _ma2l1en _ma2l1int _ma2l1o2d _ma2l1oc _ma2r1x _mac1ro _macro1s2c _mag1ni _mag1nu _magni1ci _magni1fi _magnifi1ca _mala1d2r _malad1re _mil1li _mil3l _milli1am _mo1no _mono1a2 _mono1e2 _mono1i2 _mono1o2 _mono1s2 _mono1u2 _mono1é2 _mono1ï2dé _mé1go _mé1se _mé1su _mé1ta _mé1ta1s2ta _mé2g1oh _mé2s1es _mé2s1i _mé2s1u2s _mé2sa _mé3san _no1no _no2n1obs _o1vi _o4 _on1gu _on3guent_ _oua1ou _ovi1s2c _p1ha _p1lu _p1ro _p1ré _p1sy _pa1na _pa1ni _pa1no _pa1r2h _pa1ra _pa1re _pa1te _pa2n1a2f _pa2n1a2mé _pa2n1a2ra _pa2n1is _pa2n1o2p2h _pa2n1opt _pa2r1a2c2he _pa2r1a2c2hè _pa2r3hé _pa3rent_ _pa3tent_ _para1c2h _para1s2 _pe1r1a2 _pe1r1e2 _pe1r1i2 _pe1r1o2 _pe1r1u2 _pe1r1é2 _pe4r _pen2ta _pha1la _phalan3s2t _plu1ri _pluri1a _pon1te _pon2tet _pos1ti _pos2t1in _pos2t1o2 _pos2t3h _pos2t3r _post1s2 _pro1g2n _pro1s2cé _pro1é2 _pro2g3na1t2h _prog1na _prou3d2h _pré1a2 _pré1e2 _pré1i2 _pré1o2 _pré1s2 _pré1u2 _pré1é2 _pré2a3la _pré2au _psyc2ho _psycho1a2n _pud1d2l _pé1ri _péri1os _péri1s2 _péri1u2 _péri2s3s _péri2s3ta _re1s2 _re2s3c1ri _re2s3cap _re2s3ci1si _re2s3ci1so _re2s3cou _re2s3pect _re2s3pir _re2s3plend _re2s3pons _re2s3quil _re2s3s _re2s3t _re3s4t2r _re3s4tab _re3s4tag _re3s4tand _re3s4tat _re3s4tim _re3s4tip _re3s4toc _re3s4top _re3s4tu _re3s4ty _re3s4tén _re3s4tér _re4s5trein _re4s5trict _re4s5trin _res1c2r _res1ca _res1ci _res1co _res1p2l _res1pe _res1pi _res1po _res1q _res1se _res1ta _res1ti _res1to _res1té _res3sent_ _resp1le _rest1re _rest1ri _ré1a2 _ré1e2 _ré1i2 _ré1o2 _ré1t2r _ré1é2 _ré2a3le _ré2a3lis _ré2a3lit _ré2aux _ré2el _ré2er _ré2i3fi _ré2uss _ré2èr _réa1li _rét1ro _rétro1a2 _réu2 _s1ta _s1ti _sar1me _sar3ment_ _ser1me _ser3ment_ _seu2le _sou1ve _sou3vent_ _sta2g3n _stil3l _su1b2l _su1bi _su1bu _su1ri _su1ro _su2b1a2 _su2b1in _su2b1ur _su2b1é2 _su2b3limin _su2b3lin _su2b3lu _su2r1a2 _su2r1e2 _su2r1i2m _su2r1inf _su2r1int _su2r1of _su2r1ox _su2r1é2 _su2r3h _su3b2alt _su3b2é3r _su3r2a3t _su3r2eau _su3r2ell _su3r2et _sub1li _subli1mi _syn1g2n _syn2g3na1t2h _syng1na _t1ri _ta1le _ta3lent_ _tri1a2c _tri1a2n _tri1a2t _tri1o2n _u4 _y4 _â4 _è4 _é1mi _é4 _émi1ne _émi3nent_ _ê4 _î4 _ô4 _û4 1a2nesthé1si 1alcool 1b2l 1b2r 1ba 1be 1bi 1bo 1bu 1by 1bâ 1bè 1bé 1bê 1bî 1bô 1bû 1c2h 1c2k 1c2l 1c2r 1ca 1ce 1ci 1co 1cu 1cy 1c½0 1câ 1cè 1cé 1cê 1cî 1cô 1cû 1d2'2 1d2r 1da 1de 1di 1do 1du 1dy 1dâ 1dè 1dé 1dê 1dî 1dô 1dû 1f2l 1f2r 1fa 1fe 1fi 1fo 1fu 1fy 1fâ 1fè 1fé 1fê 1fî 1fô 1fû 1g2ha 1g2he 1g2hi 1g2ho 1g2hy 1g2l 1g2n 1g2r 1ga 1ge 1gi 1go 1gu 1gy 1gâ 1gè 1gé 1gê 1gî 1gô 1gû 1ha 1he 1hi 1ho 1hu 1hy 1hâ 1hè 1hé 1hê 1hî 1hô 1hû 1informat 1j 1k2h 1k2r 1ka 1ke 1ki 1ko 1ku 1ky 1kâ 1kè 1ké 1kê 1kî 1kô 1kû 1la 1le 1li 1lo 1lu 1ly 1là 1lâ 1lè 1lé 1lê 1lî 1lô 1lû 1m2nès 1m2né1mo 1m2né1si 1ma 1me 1mi 1mo 1mu 1my 1m½0 1mâ 1mè 1mé 1mê 1mî 1mô 1mû 1na 1ne 1ni 1no 1nu 1ny 1n½0 1nâ 1nè 1né 1nê 1nî 1nô 1nû 1octet 1p2h 1p2l 1p2neu 1p2né 1p2r 1p2sy1c2h 1p2tèr 1p2tér 1pa 1pe 1pi 1po 1pu 1py 1pâ 1pè 1pé 1pê 1pî 1pô 1pû 1q 1r2h 1ra 1re 1ri 1ro 1ru 1ry 1râ 1rè 1ré 1rê 1rî 1rô 1rû 1s2c2h 1s2ca1p2h 1s2clér 1s2cop 1s2h 1s2lav 1s2lov 1s2patia 1s2perm 1s2phèr 1s2phér 1s2piel 1s2piros 1s2por 1s2tandard 1s2tein 1s2tigm 1s2to1c2k 1s2tomos 1s2tro1p2h 1s2truc1tu 1s2ty1le 1sa 1se 1si 1so 1su 1sy 1s½0 1sâ 1sè 1sé 1sê 1sî 1sô 1sû 1t2h 1t2r 1ta 1te 1ti 1to 1tu 1ty 1tà 1tâ 1tè 1té 1tê 1tî 1tô 1tû 1v2r 1va 1ve 1vi 1vo 1vu 1vy 1vâ 1vè 1vé 1vê 1vî 1vô 1vû 1w2r 1wa 1we 1wi 1wo 1wu 1za 1ze 1zi 1zo 1zu 1zy 1zè 1zé 1ç 1é2drie 1é2drique 1é2lec1t2r 1é2lément 1é2nerg 2'2 2b2lent_ 2b2rent_ 2bent_ 2c1k3h 2c2kent_ 2c2lent_ 2c2rent_ 2cent_ 2chb 2chent_ 2chg 2chm 2chn 2chp 2chs 2cht 2chw 2ckb 2ckf 2ckg 2ckp 2cks 2ckt 2d2lent_ 2d2rent_ 2dent_ 2f2lent_ 2f2rent_ 2fent_ 2g2lent_ 2g2nent_ 2g2rent_ 2gent_ 2guent_ 2jent_ 2jk 2kent_ 2lent_ 2nent_ 2p2lent_ 2p2rent_ 2pent_ 2phent_ 2phn 2phs 2pht 2quent_ 2r3heur 2r3hy1d2r 2rent_ 2s2chs 2s3hom 2sent_ 2shent_ 2shm 2shr 2shs 2t2rent_ 2t3heur 2tent_ 2thl 2thm 2thn 2ths 2v2rent_ 2vent_ 2went_ 2xent_ 2zent_ 3d2hal 3d2houd 3ph2ta1lé 3ph2tis 4b4le_ 4b4les_ 4b4re_ 4b4res_ 4be_ 4bes_ 4c4he_ 4c4hes_ 4c4ke_ 4c4kes_ 4c4le_ 4c4les_ 4c4re_ 4c4res_ 4ce_ 4ces_ 4ch_ 4ch4le_ 4ch4les_ 4ch4re_ 4ch4res_ 4ck_ 4d4re_ 4d4res_ 4de_ 4des_ 4f4le_ 4f4les_ 4f4re_ 4f4res_ 4fe_ 4fes_ 4g4le_ 4g4les_ 4g4ne_ 4g4nes_ 4g4re_ 4g4res_ 4ge_ 4ges_ 4gue_ 4gues_ 4he_ 4hes_ 4je_ 4jes_ 4ke_ 4kes_ 4kh_ 4le_ 4les_ 4me_ 4mes_ 4ne_ 4nes_ 4p4he_ 4p4hes_ 4p4le_ 4p4les_ 4p4re_ 4p4res_ 4pe_ 4pes_ 4ph_ 4ph4le_ 4ph4les_ 4ph4re_ 4ph4res_ 4que_ 4ques_ 4r4he_ 4r4hes_ 4re_ 4res_ 4s4c4he_ 4s4c4hes_ 4s4ch_ 4s4he_ 4s4hes_ 4se_ 4ses_ 4sh_ 4t4he_ 4t4hes_ 4t4re_ 4t4res_ 4te_ 4tes_ 4th_ 4th4re_ 4th4res_ 4v4re_ 4v4res_ 4ve_ 4ves_ 4we_ 4wes_ 4ze_ 4zes_ a1bî a1la a1ma a1ne a1ni a1po a1vi a1è2d1re a2l1al1gi a2s3t1ro ab1se ab2h ab3sent_ abs1ti absti1ne absti3nent_ abî1me abî2ment_ ac1ce ac1q ac3cent_ acquies1ce acquies4cent_ ad2h ai1me ai2ment_ al1co amal1ga amalga1me amalga2ment_ an1ti anes1t2h anest1hé ani1me ani2ment_ anti1fe antifer1me antifer3ment_ ap1pa apo2s3t2r appa1re appa3rent_ ar1c ar1c2h ar1me ar1mi ar2ment_ arc2hi archi1é2pis archié1pi armil5l as1me as1t2r as2ment_ au1me au2ment_ avil4l aè1d2r b1le b1re b1ru bou1me bou1ti bou2ment_ boutil3l bru1me bru2ment_ c1ci c1ke c1la c1le c1re c2ha c2he c2hi c2ho c2hu c2hy c2hâ c2hè c2hé c2hê c2hî c2hô c2hû ca1pi ca1rê ca3ou3t2 capil3l carê1me carê2ment_ cci1de cci3dent_ ch1le ch1lo ch1re ch1ro ch2l ch2r che1vi chevil4l chien1de chien3dent_ chlo1ra chlo1ré chlo2r3a2c chlo2r3é2t chro1me chro2ment_ cil3l cla1me cla2ment_ co1a2d co1ac1q co1acc co1ap co1ar co1assoc co1assur co1au co1ax co1ef co1en co1ex co1g2n co1nu co1é2 co2g3ni1ti co2nurb coas1so coas1su cog1ni com1pé compé1te compé3tent_ con1fi con1ni con1ti confi1de confi3dent_ conni1ve conni3vent_ conti1ne conti3nent_ contin1ge contin3gent_ cor1pu corpu1le corpu3lent_ cur1re cur3rent_ cy1ri cyril3l d1d2h d1ha d1ho d1le d1re d1s2 da1me da2ment_ di1li di2s3cop dia1p2h diaph1ra diaph2r diaphrag1me diaphrag2ment_ dili1ge dili3gent_ dis1co dis1si dis1ti dissi1de dissi3dent_ distil3l dé1ca dé1t2r déca1de déca3dent_ dét1ri détri1me détri3ment_ e1ni e2n1i2v2r e2s3c2h e2s3cop en1t2r ent1re entre1ge entre3gent_ er1me er2ment_ es1ce es1co es1ti es3cent_ esti1me esti2ment_ eu1s2tat eus1ta ex1t2r ext1ra1 extra2c extra2i f1la f1le f1re f1ri f1s2 fa1me fa2ment_ fi1c2h fic2hu fichu1me fichu3ment_ fir1me fir2ment_ flam1me flam2ment_ fri1ti fritil3l fu1me fu2ment_ fé1cu fécu1le fécu3lent_ g1le g1ne g1ra g1re g1s2 gil3l gram1me gram2ment_ gran1di grandi1lo grandilo1q grandilo3quent_ hil3l hu1me hu2ment_ hy1pe hy1po hype1ra2 hype1re2 hype1ri2 hype1ro2 hype1ru2 hype1ré2 hype4r1 hypers2 hypo1a2 hypo1e2 hypo1i2 hypo1o2 hypo1s2 hypo1u2 hypo1é2 hé1mi hé1mo hémi1é hémo1p2t i1al1gi i1arth2r i1b2r i1oxy i1s2c2h i1s2tat i1va i1è2d1re i2s3c2hé i2s3chia i2s3chio iar1t2h ib1ri ibril3l il2l im1ma im1mi im1po im1pu imma1ne imma3nent_ immi1ne immi3nent_ immis1ce immis4cent_ impo1te impo3tent_ impu1de impu3dent_ in1ci in1di in1do in1du in1fo in1no in1so in1te in1ti inci1de inci3dent_ indi1ge indi3gent_ indo1le indo3lent_ indul1ge indul3gent_ infor1ma inno1ce inno3cent_ ins1ti inso1le inso3lent_ instil3l intel1li intelli1ge intelli3gent_ inti1me inti2ment_ io1a2ct is1ce is1ta is3cent_ isc2hi iva1le iva3lent_ iè1d2r ja1ce ja3cent_ l1li l1lu l1me l1s2t l2ment_ l3lion la1w2r la2w3re lil3l llu1me llu2ment_ m1nè m1né m1s2 mi1me mi2ment_ mil1le mil3l mil4let mit1te mit3tent_ mo1no mon1t2r mon2t3réal mono1va monova1le monova3lent_ mont1ré moye1nâ moye2n1â2g mu1ni muni1fi munifi1ce munifi3cent_ mé1co mécon1te mécon3tent_ n1sa n1x n3s2at_ n3s2ats_ nu1t2r nut1ri nutri1me nutri3ment_ o1b2l o1d2l o1g2n o1io1ni o1pu o1s2tas o1s2tat o1s2tim o1s2tom o1s2tra1tu o1s2trad o1s2triction o1s2té1ro o1è2d1re o2b3long o2g3no1si o2g3nomo1ni ob1lo oc1te og1no ogno1mo om1bu om1me om1ni om2ment_ ombud2s3 omni1po omni1s2 omnipo1te omnipo3tent_ opu1le opu3lent_ or1me or2ment_ os1t2r os1ta os1ti os1to os1té ost1ra ost1ri ostric1ti oxy1a2 oè1d2r p1he p1ho p1le p1lu p1ne p1re p1ri p1ro p1ru p1ré p1sy p1tè p1té pa1lé pa1pi paléo1é2 papil1lo papil2l papil3la papil3le papil3li papil3lom pe1r3h per1ma per1ti perma1ne perma3nent_ perti1ne perti3nent_ ph1le ph1re ph1ta ph1ti ph2l ph2r pho1to photo1s2 pi1ri piril3l plu1me plu2ment_ po1ast1re po1ly poas1t2r poly1a2 poly1e2 poly1i2 poly1o2 poly1s2 poly1u2 poly1va poly1è2 poly1é2 polyva1le polyva3lent_ pri1va privat1do privatdo1ce privatdo1ze privatdo3cent_ privatdo3zent_ pro2s3tat pros1ta proé1mi proémi1ne proémi3nent_ pru1de pru3dent_ pré1se pré3sent_ préé1mi préémi1ne préémi3nent_ pu1g2n pu1pi pu1si pu2g3nab1le pu2g3nac pug1na pugna1b2l pupil3l pusil3l pé1nu pé1r2é2q pé1ré pé2nul qua1me qua2ment_ r1ci r1he r1hy r1mi ra1di ra1me ra2ment_ radio1a2 rai1me rai3ment_ rcil4l re1le re1li re1pe re3lent_ re3pent_ reli1me reli2ment_ ri1me ri2ment_ rin1ge rin3gent_ rmil4l ru1le ru3lent_ ry1t2h ry2thm ryth1me ryth2ment_ ré1ge ré1ma ré1su ré1ti ré3gent_ réma1ne réma3nent_ résur1ge résur3gent_ réti1ce réti3cent_ s1c2l s1ca s1co s1he s1ho s1la s1lo s1p2h s1pa s1pe s1pi s1po s1t2r s1ta s1te s1ti s1to s1ty s1té sc1lé sc2he se1mi semil4l ser1ge ser1pe ser3gent_ ser3pent_ ses1q sesqui1a2 sla1lo slalo1me slalo2ment_ sp1hè sp1hé spa1ti spi1ro spo1ru sporu1le sporu4lent_ st1ro st1ru stan1da sto1mo sté1ré stéréo1s2 su1b2l su1me su1pe su1ra su1ré su2ment_ su3r2ah sub1li sub1s2 subli1me subli2ment_ suc1cu succu1le succu3lent_ supe1ro2 supe4r1 supers2 suré1mi surémi1ne surémi3nent_ t1c2h t1he t1ra t1re t1ri t1ru t1t2l ta1c2h ta1me ta2ment_ tac2hy tachy1a2 tan1ge tan3gent_ tc2hi tchin3t2 tem1pé tempé1ra tempéra1me tempéra3ment_ ter1ge ter3gent_ tes1ta testa1me testa3ment_ th1re th1ri th2r ther1mo thermo1s2 thril3l to1me to2ment_ tor1re tor3rent_ tran2s1a2 tran2s1o2 tran2s1u2 tran2s3h tran2s3p tran3s2act tran3s2ats trans1pa transpa1re transpa3rent_ tri1de tri3dent_ tru1cu trucu1le trucu3lent_ tu1me tu2ment_ tung2s3 tur1bu turbu1le turbu3lent_ té1lé télé1e2 télé1i2 télé1o2b télé1o2p télé1s2 u1ci u1ni u1vi u2s3t2r ucil4l ue1vi uevil4l uni1a2x uni1o2v uvil4l v1re va1ci va1ni vacil4l vanil1li vanil2l vanil3lin vanil3lis ve1ni ven1t2r veni1me veni2ment_ vent1ri ventri1po ventripo1te ventripo3tent_ vi1di vidi1me vidi2ment_ vil3l vol1ta vol2t1amp vé1lo vélo1s2ki wa2g3n xil3l y1al1gi y1as1t2h y1s2tom ys1to â1me â2ment_ è1me è2ment_ é1ce é1ci é1cu é1d2r é1de é1le é1li é1lo é1lé é1mi é1ne é1ni é1pi é1q é1re é3cent_ é3dent_ é3quent_ é3rent_ éci1me éci2ment_ écu1me écu2ment_ éd1ri éd2hi édri1q éli1me éli2ment_ élo1q élo3quent_ élé1me émil4l éni1te éni3tent_ épi2s3cop épi3s4co1pe épis1co équi1po équi1va équipo1te équipo3tent_ équiva1le équiva4lent_ ô1me ô2ment_"
?>