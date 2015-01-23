<?php

namespace Hametuha\HamePub\Definitions;

/**
 * Marc Code List for Relators
 *
 * @see http://www.loc.gov/marc/relators/relaterm.html
 * @package Hametuha\HamePub\Definitions
 */
class Marc extends Prototype
{

	protected static $schema = 'marc:relators';

	/**
	 * Abridger
	 *
	 * A person, family, or organization contributing to a resource
	 * by shortening or condensing the original work
	 * but leaving the nature and content of the original work substantially unchanged.
	 * For substantial modifications that result in the creation of a new work, see author
	 */
	const ABRIDGER = 'abr';

	/**
	 * Actor
	 *
	 * A performer contributing to an expression of a work
	 * by acting as a cast member or player
	 * in a musical or dramatic presentation, etc.
	 */
	const ACTOR = 'act';

	/**
	 * Adapter
	 *
	 * A person or organization who 1) reworks a musical composition, usually for a different medium, or 2) rewrites novels or stories for motion pictures or other audiovisual medium.
	 */
	const ADAPTER = 'adp';

	/**
	 * Addressee
	 *
	 * A person, family, or organization to whom
	 * the correspondence in a work is addressed
	 */
	const ADDRESSEE = 'rcp';

	/**
	 * Analyst
	 *
	 * A person or organization that reviews,
	 * examines and interprets data or information in a specific area
	 */
	const ANALYST = 'anl';

	/**
	 * Animator
	 *
	 * A person contributing to a moving image work
	 * or computer program by giving apparent movement to inanimate objects
	 * or drawings. For the creator of the drawings that are animated, see artist
	 */
	const ANIMATOR = 'anm';

	/**
	 * Annotator
	 *
	 * A person who makes manuscript annotations on an item
	 */
	const ANNOTATOR = 'ann';

	/**
	 * Appellant
	 *
	 * A person or organization who appeals a lower court's decision
	 */
	const APPELLANT = 'apl';

	/**
	 * Appellee
	 *
	 * A person or organization against whom an appeal is taken
	 */
	const APPELLEE = 'ape';

	/**
	 * Applicant
	 *
	 * A  person or organization responsible for the submission of
	 * an application or who is named as eligible for the results
	 * of the processing of the application
	 * (e.g., bestowing of rights, reward, title, position)
	 */
	const APPLICANT = 'app';

	/**
	 * Architect
	 *
	 * A person, family, or organization responsible for creating
	 * an architectural design, including a pictorial representation
	 * intended to show how a building, etc., will look when completed.
	 * It also oversees the construction of structures
	 */
	const ARCHITECT = 'arc';

	/**
	 * Arranger
	 *
	 * A person, family, or organization contributing to a musical work
	 * by rewriting the composition for a medium of performance
	 * different from that for which the work was originally intended,
	 * or modifying the work for the same medium of performance, etc.,
	 * such that the musical substance of the original composition remains essentially unchanged.
	 * For extensive modification that effectively results in the creation of a new musical work, see composer
	 */
	const ARRANGER = 'arr';

	/**
	 * Art copyist
	 *
	 * A person (e.g., a painter or sculptor) who makes copies of works of visual art
	 */
	const ART_COPYIST = 'acp';

	/**
	 * Art director
	 *
	 * A person contributing to a motion picture or television production
	 * by overseeing the artists and craftspeople who build the sets
	 */
	const ART_DIRECTOR = 'adi';

	/**
	 * Artist
	 *
	 * A person, family, or organization responsible for creating a work
	 * by conceiving, and implementing, an original graphic design, drawing, painting, etc.
	 * For book illustrators, prefer Illustrator [ill]
	 */
	const ARTIST = 'art';

	/**
	 * Artistic director
	 *
	 * A person responsible for controlling the development of the artistic style
	 * of an entire production, including the choice of works to be presented
	 * and selection of senior production staff
	 */
	const ARTISTIC_DIRECTOR = 'ard';

	/**
	 * Assignee
	 *
	 * A person or organization to whom a license for printing or publishing has been transferred
	 */
	const ASSIGNEE = 'asg';

	/**
	 * Associated name
	 *
	 * A person or organization associated with or found in an item or collection,
	 * which cannot be determined to be that of a Former owner [fmo]
	 * or other designated relationship indicative of provenance
	 */
	const ASSOCIATED_NAME = 'asn';

	/**
	 * Attributed name
	 *
	 * An author, artist, etc., relating him/her to a resource for which there is or once was substantial authority for designating that person as author, creator, etc. of the work
	 */
	const ATTRIBUTED_NAME = 'att';

	/**
	 * Auctioneer
	 *
	 * A person or organization in charge of the estimation and public auctioning of goods, particularly books, artistic works, etc.
	 */
	const AUCTIONEER = 'auc';

	/**
	 * Author
	 *
	 * A person, family, or organization responsible for creating a work that is primarily textual in content, regardless of media type (e.g., printed text, spoken word, electronic text, tactile text) or genre (e.g., poems, novels, screenplays, blogs). Use also for persons, etc., creating a new work by paraphrasing, rewriting, or adapting works by another creator such that the modification has substantially changed the nature and content of the original or changed the medium of expression
	 */
	const AUTHOR = 'aut';

	/**
	 * Author in quotations or text abstracts
	 *
	 * A person or organization whose work is largely quoted or extracted in works to which he or she did not contribute directly. Such quotations are found particularly in exhibition catalogs, collections of photographs, etc.
	 */
	const AUTHOR_IN_QUOTATIONS_OR_TEXT_ABSTRACTS = 'aqt';

	/**
	 * Author of afterword, colophon, etc.
	 *
	 * A person or organization responsible for an afterword, postface, colophon, etc. but who is not the chief author of a work
	 */
	const AUTHOR_OF_AFTERWORD = 'aft';

	/**
	 * Author of dialog
	 *
	 * A person or organization responsible for the dialog or spoken commentary for a screenplay or sound recording
	 */
	const AUTHOR_OF_DIALOG = 'aud';

	/**
	 * Author of introduction, etc.
	 *
	 * A person or organization responsible for an introduction, preface, foreword, or other critical introductory matter, but who is not the chief author
	 */
	const AUTHOR_OF_INTRODUCTION = 'aui';

	/**
	 * Autographer
	 *
	 * A person whose manuscript signature appears on an item
	 */
	const AUTOGRAPHER = 'ato';

	/**
	 * Bibliographic antecedent
	 *
	 * A person or organization responsible for a resource upon which the resource represented by the bibliographic description is based. This may be appropriate for adaptations, sequels, continuations, indexes, etc.
	 */
	const BIBLIOGRAPHIC_ANTECEDENT = 'ant';

	/**
	 * Binder
	 *
	 * A person who binds an item
	 */
	const BINDER = 'bnd';

	/**
	 * Binding designer
	 *
	 * A person or organization responsible for the binding design of a book, including the type of binding, the type of materials used, and any decorative aspects of the binding
	 */
	const BINDING_DESIGNER = 'bdd';

	/**
	 * Blurb writer
	 *
	 * A person or organization responsible for writing a commendation or testimonial for a work, which appears on or within the publication itself, frequently on the back or dust jacket of print publications or on advertising material for all media
	 */
	const BLURB_WRITER = 'blw';

	/**
	 * Book designer
	 *
	 * A person or organization involved in manufacturing a manifestation by being responsible for the entire graphic design of a book, including arrangement of type and illustration, choice of materials, and process used
	 */
	const BOOK_DESIGNER = 'bkd';

	/**
	 * Book producer
	 *
	 * A person or organization responsible for the production of books and other print media
	 */
	const BOOK_PRODUCER = 'bkp';

	/**
	 * Bookjacket designer
	 *
	 * A person or organization responsible for the design of flexible covers designed for or published with a book, including the type of materials used, and any decorative aspects of the bookjacket
	 */
	const BOOKJACKET_DESIGNER = 'bjd';

	/**
	 * Bookplate designer
	 *
	 * A person or organization responsible for the design of a book owner's identification label that is most commonly pasted to the inside front cover of a book
	 */
	const BOOKPLATE_DESIGNER = 'bpd';

	/**
	 * Bookseller
	 *
	 * A person or organization who makes books and other bibliographic materials available for purchase. Interest in the materials is primarily lucrative
	 */
	const BOOKSELLER = 'bsl';

	/**
	 * Braille embosser
	 *
	 * A person, family, or organization involved in manufacturing a resource by embossing Braille cells using a stylus, special embossing printer, or other device
	 */
	const BRAILLE_EMBOSSER = 'brl';

	/**
	 * Broadcaster
	 *
	 * A person, family, or organization involved in broadcasting a resource to an audience via radio, television, webcast, etc.
	 */
	const BROADCASTER = 'brd';

	/**
	 * Calligrapher
	 *
	 * A person or organization who writes in an artistic hand, usually as a copyist and or engrosser
	 */
	const CALLIGRAPHER = 'cll';

	/**
	 * Cartographer
	 *
	 * A person, family, or organization responsible for creating a map, atlas, globe, or other cartographic work
	 */
	const CARTOGRAPHER = 'ctg';

	/**
	 * Caster
	 *
	 * A person, family, or organization involved in manufacturing a resource by pouring a liquid or molten substance into a mold and leaving it to solidify to take the shape of the mold
	 */
	const CASTER = 'cas';

	/**
	 * Censor
	 *
	 * A person or organization who examines bibliographic resources for the purpose of suppressing parts deemed objectionable on moral, political, military, or other grounds
	 */
	const CENSOR = 'cns';

	/**
	 * Choreographer
	 *
	 * A person responsible for creating or contributing to a work of movement
	 */
	const CHOREOGRAPHER = 'chr';

	/**
	 * Cinematographer
	 *
	 * A person in charge of photographing a motion picture, who plans the technical aspets of lighting and photographing of scenes, and often assists the director in the choice of angles, camera setups, and lighting moods. He or she may also supervise the further processing of filmed material up to the completion of the work print. Cinematographer is also referred to as director of photography. Do not confuse with videographer
	 */
	const CINEMATOGRAPHER = 'cng';

	/**
	 * Client
	 *
	 * A person or organization for whom another person or organization is acting
	 */
	const CLIENT = 'cli';

	/**
	 * Collection registrar
	 *
	 * A curator who lists or inventories the items in an aggregate work such as a collection of items or works
	 */
	const COLLECTION_REGISTRAR = 'cor';

	/**
	 * Collector
	 *
	 * A curator who brings together items from various sources that are then arranged, described, and cataloged as a collection. A collector is neither the creator of the material nor a person to whom manuscripts in the collection may have been addressed
	 */
	const COLLECTOR = 'col';

	/**
	 * Collotyper
	 *
	 * A person, family, or organization involved in manufacturing a manifestation of photographic prints from film or other colloid that has ink-receptive and ink-repellent surfaces
	 */
	const COLLOTYPER = 'clt';

	/**
	 * Colorist
	 *
	 * A person or organization responsible for applying color to drawings, prints, photographs, maps, moving images, etc
	 */
	const COLORIST = 'clr';

	/**
	 * Commentator
	 *
	 * A performer contributing to a work by providing interpretation, analysis, or a discussion of the subject matter on a recording, film, or other audiovisual medium
	 */
	const COMMENTATOR = 'cmm';

	/**
	 * Commentator for written text
	 *
	 * A person or organization responsible for the commentary or explanatory notes about a text. For the writer of manuscript annotations in a printed book, use Annotator
	 */
	const COMMENTATOR_FOR_WRITTEN_TEXT = 'cwt';

	/**
	 * Compiler
	 *
	 * A person, family, or organization responsible for creating a new work (e.g., a bibliography, a directory) through the act of compilation, e.g., selecting, arranging, aggregating, and editing data, information, etc
	 */
	const COMPILER = 'com';

	/**
	 * Complainant
	 *
	 * A person or organization who applies to the courts for redress, usually in an equity proceeding
	 */
	const COMPLAINANT = 'cpl';

	/**
	 * Complainant-appellant
	 *
	 * A complainant who takes an appeal from one court or jurisdiction to another to reverse the judgment, usually in an equity proceeding
	 */
	const COMPLAINANT_APPELLANT = 'cpt';

	/**
	 * Complainant-appellee
	 *
	 * A complainant against whom an appeal is taken from one court or jurisdiction to another to reverse the judgment, usually in an equity proceeding
	 */
	const COMPLAINANT_APPELLEE = 'cpe';

	/**
	 * Composer
	 *
	 * A person, family, or organization responsible for creating or contributing to a musical resource by adding music to a work that originally lacked it or supplements it
	 */
	const COMPOSER = 'cmp';

	/**
	 * Compositor
	 *
	 * A person or organization responsible for the creation of metal slug, or molds made of other materials, used to produce the text and images in printed matter
	 */
	const COMPOSITOR = 'cmt';

	/**
	 * Conceptor
	 *
	 * A person or organization responsible for the original idea on which a work is based, this includes the scientific author of an audio-visual item and the conceptor of an advertisement
	 */
	const CONCEPTOR = 'ccp';

	/**
	 * Conductor
	 *
	 * A performer contributing to a musical resource by leading a performing group (orchestra, chorus, opera, etc.) in a musical or dramatic presentation, etc.
	 */
	const CONDUCTOR = 'cnd';

	/**
	 * Conservator
	 *
	 * A person or organization responsible for documenting, preserving, or treating printed or manuscript material, works of art, artifacts, or other media
	 */
	const CONSERVATOR = 'con';

	/**
	 * Consultant
	 *
	 * A person or organization relevant to a resource, who is called upon for professional advice or services in a specialized field of knowledge or training
	 */
	const CONSULTANT = 'csl';

	/**
	 * Consultant to a project
	 *
	 * A person or organization relevant to a resource, who is engaged specifically to provide an intellectual overview of a strategic or operational task and by analysis, specification, or instruction, to create or propose a cost-effective course of action or solution
	 */
	const CONSULTANT_TO_A_PROJECT = 'csp';

	/**
	 * Contestant
	 *
	 * A person(s) or organization who opposes, resists, or disputes, in a court of law, a claim, decision, result, etc.
	 */
	const CONTESTANT = 'cos';

	/**
	 * Contestant-appellant
	 *
	 * A contestant who takes an appeal from one court of law or jurisdiction to another to reverse the judgment
	 */
	const CONTESTANT_APPELLANT = 'cot';

	/**
	 * Contestant-appellee
	 *
	 * A contestant against whom an appeal is taken from one court of law or jurisdiction to another to reverse the judgment
	 */
	const CONTESTANT_APPELLEE = 'coe';

	/**
	 * Contestee
	 *
	 * A person(s) or organization defending a claim, decision, result, etc. being opposed, resisted, or disputed in a court of law
	 */
	const CONTESTEE = 'cts';

	/**
	 * Contestee-appellant
	 *
	 * A contestee who takes an appeal from one court or jurisdiction to another to reverse the judgment
	 */
	const CONTESTEE_APPELLANT = 'ctt';

	/**
	 * Contestee-appellee
	 *
	 * A contestee against whom an appeal is taken from one court or jurisdiction to another to reverse the judgment
	 */
	const CONTESTEE_APPELLEE = 'cte';

	/**
	 * Contractor
	 *
	 * A person or organization relevant to a resource, who enters into a contract with another person or organization to perform a specific
	 */
	const CONTRACTOR = 'ctr';

	/**
	 * Contributor
	 *
	 * A person, family or organization responsible for making contributions to the resource. This includes those whose work has been contributed to a larger work, such as an anthology, serial publication, or other compilation of individual works. If a more specific role is available, prefer that, e.g. editor, compiler, illustrator
	 */
	const CONTRIBUTOR = 'ctb';

	/**
	 * Copyright claimant
	 *
	 * A person or organization listed as a copyright owner at the time of registration. Copyright can be granted or later transferred to another person or organization, at which time the claimant becomes the copyright holder
	 */
	const COPYRIGHT_CLAIMANT = 'cpc';

	/**
	 * Copyright holder
	 *
	 * A person or organization to whom copy and legal rights have been granted or transferred for the intellectual content of a work. The copyright holder, although not necessarily the creator of the work, usually has the exclusive right to benefit financially from the sale and use of the work to which the associated copyright protection applies
	 */
	const COPYRIGHT_HOLDER = 'cph';

	/**
	 * Corrector
	 *
	 * A person or organization who is a corrector of manuscripts, such as the scriptorium official who corrected the work of a scribe. For printed matter, use Proofreader
	 */
	const CORRECTOR = 'crr';

	/**
	 * Correspondent
	 *
	 * A person or organization who was either the writer or recipient of a letter or other communication
	 */
	const CORRESPONDENT = 'crp';

	/**
	 * Costume designer
	 *
	 * A person, family, or organization that designs the costumes for a moving image production or for a musical or dramatic presentation or entertainment
	 */
	const COSTUME_DESIGNER = 'cst';

	/**
	 * Court governed
	 *
	 * A court governed by court rules, regardless of their official nature (e.g., laws, administrative regulations)
	 */
	const COURT_GOVERNED = 'cou';

	/**
	 * Court reporter
	 *
	 * A person, family, or organization contributing to a resource by preparing a court's opinions for publication
	 */
	const COURT_REPORTER = 'crt';

	/**
	 * Cover designer
	 *
	 * A person or organization responsible for the graphic design of a book cover, album cover, slipcase, box, container, etc. For a person or organization responsible for the graphic design of an entire book, use Book designer; for book jackets, use Bookjacket designer
	 */
	const COVER_DESIGNER = 'cov';

	/**
	 * Creator
	 *
	 * A person or organization responsible for the intellectual or artistic content of a resource
	 */
	const CREATOR = 'cre';

	/**
	 * Curator
	 *
	 * A person, family, or organization conceiving, aggregating, and/or organizing an exhibition, collection, or other item
	 */
	const CURATOR = 'cur';

	/**
	 * Dancer
	 *
	 * A performer who dances in a musical, dramatic, etc., presentation
	 */
	const DANCER = 'dnc';

	/**
	 * Data contributor
	 *
	 * A person or organization that submits data for inclusion in a database or other collection of data
	 */
	const DATA_CONTRIBUTOR = 'dtc';

	/**
	 * Data manager
	 *
	 * A person or organization responsible for managing databases or other data sources
	 */
	const DATA_MANAGER = 'dtm';

	/**
	 * Dedicatee
	 *
	 * A person, family, or organization to whom a resource is dedicated
	 */
	const DEDICATEE = 'dte';

	/**
	 * Dedicator
	 *
	 * A person who writes a dedication, which may be a formal statement or in epistolary or verse form
	 */
	const DEDICATOR = 'dto';

	/**
	 * Defendant
	 *
	 * A person or organization who is accused in a criminal proceeding or sued in a civil proceeding
	 */
	const DEFENDANT = 'dfd';

	/**
	 * Defendant-appellant
	 *
	 * A defendant who takes an appeal from one court or jurisdiction to another to reverse the judgment, usually in a legal action
	 */
	const DEFENDANT_APPELLANT = 'dft';

	/**
	 * Defendant-appellee
	 *
	 * A defendant against whom an appeal is taken from one court or jurisdiction to another to reverse the judgment, usually in a legal action
	 */
	const DEFENDANT_APPELLEE = 'dfe';

	/**
	 * Degree granting institution
	 *
	 * A organization granting an academic degree
	 */
	const DEGREE_GRANTING_INSTITUTION = 'dgg';

	/**
	 * Degree supervisor
	 *
	 * A person overseeing a higher level academic degree
	 */
	const DEGREE_SUPERVISOR = 'dgs';

	/**
	 * Delineator
	 *
	 * A person or organization executing technical drawings from others' designs
	 */
	const DELINEATOR = 'dln';

	/**
	 * Depicted
	 *
	 * An entity depicted or portrayed in a work, particularly in a work of art
	 */
	const DEPICTED = 'dpc';

	/**
	 * Depositor
	 *
	 * A current owner of an item who deposited the item into the custody of another person, family, or organization, while still retaining ownership
	 */
	const DEPOSITOR = 'dpt';

	/**
	 * Designer
	 *
	 * A person, family, or organization responsible for creating a design for an object
	 */
	const DESIGNER = 'dsr';

	/**
	 * Director
	 *
	 * A person responsible for the general management and supervision of a filmed performance, a radio or television program, etc.
	 */
	const DIRECTOR = 'drt';

	/**
	 * Dissertant
	 *
	 * A person who presents a thesis for a university or higher-level educational degree
	 */
	const DISSERTANT = 'dis';

	/**
	 * Distribution place
	 *
	 * A place from which a resource, e.g., a serial, is distributed
	 */
	const DISTRIBUTION_PLACE = 'dbp';

	/**
	 * Distributor
	 *
	 * A person or organization that has exclusive or shared marketing rights for a resource
	 */
	const DISTRIBUTOR = 'dst';

	/**
	 * Donor
	 *
	 * A former owner of an item who donated that item to another owner
	 */
	const DONOR = 'dnr';

	/**
	 * Draftsman
	 *
	 * A person, family, or organization contributing to a resource by an architect, inventor, etc., by making detailed plans or drawings for buildings, ships, aircraft, machines, objects, etc
	 */
	const DRAFTSMAN = 'drm';

	/**
	 * Dubious author
	 *
	 * A person or organization to which authorship has been dubiously or incorrectly ascribed
	 */
	const DUBIOUS_AUTHOR = 'dub';

	/**
	 * Editor
	 *
	 * A person, family, or organization contributing to a resource by revising or elucidating the content, e.g., adding an introduction, notes, or other critical matter. An editor may also prepare a resource for production, publication, or distribution. For major revisions, adaptations, etc., that substantially change the nature and content of the original work, resulting in a new work, see author
	 */
	const EDITOR = 'edt';

	/**
	 * Editor of compilation
	 *
	 * A person, family, or organization contributing to a collective or aggregate work by selecting and putting together works, or parts of works, by one or more creators. For compilations of data, information, etc., that result in new works, see compiler
	 */
	const EDITOR_OF_COMPILATION = 'edc';

	/**
	 * Editor of moving image work
	 *
	 * A person, family, or organization responsible for assembling, arranging, and trimming film, video, or other moving image formats, including both visual and audio aspects
	 */
	const EDITOR_OF_MOVING_IMAGE_WORK = 'edm';

	/**
	 * Electrician
	 *
	 * A person responsible for setting up a lighting rig and focusing the lights for a production, and running the lighting at a performance
	 */
	const ELECTRICIAN = 'elg';

	/**
	 * Electrotyper
	 *
	 * A person or organization who creates a duplicate printing surface by pressure molding and electrodepositing of metal that is then backed up with lead for printing
	 */
	const ELECTROTYPER = 'elt';

	/**
	 * Enacting jurisdiction
	 *
	 * A jurisdiction enacting a law, regulation, constitution, court rule, etc.
	 */
	const ENACTING_JURISDICTION = 'enj';

	/**
	 * Engineer
	 *
	 * A person or organization that is responsible for technical planning and design, particularly with construction
	 */
	const ENGINEER = 'eng';

	/**
	 * Engraver
	 *
	 * A person or organization who cuts letters, figures, etc. on a surface, such as a wooden or metal plate used for printing
	 */
	const ENGRAVER = 'egr';

	/**
	 * Etcher
	 *
	 * A person or organization who produces text or images for printing by subjecting metal, glass, or some other surface to acid or the corrosive action of some other substance
	 */
	const ETCHER = 'etr';

	/**
	 * Event place
	 *
	 * A place where an event such as a conference or a concert took place
	 */
	const EVENT_PLACE = 'evp';

	/**
	 * Expert
	 *
	 * A person or organization in charge of the description and appraisal of the value of goods, particularly rare items, works of art, etc.
	 */
	const EXPERT = 'exp';

	/**
	 * Facsimilist
	 *
	 * A person or organization that executed the facsimile
	 */
	const FACSIMILIST = 'fac';

	/**
	 * Field director
	 *
	 * A person or organization that manages or supervises the work done to collect raw data or do research in an actual setting or environment (typically applies to the natural and social sciences)
	 */
	const FIELD_DIRECTOR = 'fld';

	/**
	 * Film director
	 *
	 * A director responsible for the general management and supervision of a filmed performance
	 */
	const FILM_DIRECTOR = 'fmd';

	/**
	 * Film distributor
	 *
	 * A person, family, or organization involved in distributing a moving image resource to theatres or other distribution channels
	 */
	const FILM_DISTRIBUTOR = 'fds';

	/**
	 * Film editor
	 *
	 * A person who, following the script and in creative cooperation with the Director, selects, arranges, and assembles the filmed material, controls the synchronization of picture and sound, and participates in other post-production tasks such as sound mixing and visual effects processing.  Today, picture editing is often performed digitally.
	 */
	const FILM_EDITOR = 'flm';

	/**
	 * Film producer
	 *
	 * A producer responsible for most of the business aspects of a film
	 */
	const FILM_PRODUCER = 'fmp';

	/**
	 * Filmmaker
	 *
	 * A person, family or organization responsible for creating an independent or personal film. A filmmaker is individually responsible for the conception and execution of all aspects of the film
	 */
	const FILMMAKER = 'fmk';

	/**
	 * First party
	 *
	 * A person or organization who is identified as the only party or the party of the first party. In the case of transfer of rights, this is the assignor, transferor, licensor, grantor, etc. Multiple parties can be named jointly as the first party
	 */
	const FIRST_PARTY = 'fpy';

	/**
	 * Forger
	 *
	 * A person or organization who makes or imitates something of value or importance, especially with the intent to defraud
	 */
	const FORGER = 'frg';

	/**
	 * Former owner
	 *
	 * A person, family, or organization formerly having legal possession of an item
	 */
	const FORMER_OWNER = 'fmo';

	/**
	 * Funder
	 *
	 * A person or organization that furnished financial support for the production of the work
	 */
	const FUNDER = 'fnd';

	/**
	 * Geographic information specialist
	 *
	 * A person responsible for geographic information system (GIS) development and integration with global positioning system data
	 */
	const GEOGRAPHIC_INFORMATION_SPECIALIST = 'gis';

	/**
	 * Honoree
	 *
	 * A person, family, or organization honored by a work or item (e.g., the honoree of a festschrift, a person to whom a copy is presented)
	 */
	const HONOREE = 'hnr';

	/**
	 * Host
	 *
	 * A performer contributing to a resource by leading a program (often broadcast) that includes other guests, performers, etc. (e.g., talk show host)
	 */
	const HOST = 'hst';

	/**
	 * Host institution
	 *
	 * An organization hosting the event, exhibit, conference, etc., which gave rise to a resource, but having little or no responsibility for the content of the resource
	 */
	const HOST_INSTITUTION = 'his';

	/**
	 * Illuminator
	 *
	 * A person providing decoration to a specific item using precious metals or color, often with elaborate designs and motifs
	 */
	const ILLUMINATOR = 'ilu';

	/**
	 * Illustrator
	 *
	 * A person, family, or organization contributing to a resource by supplementing the primary content with drawings, diagrams, photographs, etc. If the work is primarily the artistic content created by this entity, use artist or photographer
	 */
	const ILLUSTRATOR = 'ill';

	/**
	 * Inscriber
	 *
	 * A person who has written a statement of dedication or gift
	 */
	const INSCRIBER = 'ins';

	/**
	 * Instrumentalist
	 *
	 * A performer contributing to a resource by playing a musical instrument
	 */
	const INSTRUMENTALIST = 'itr';

	/**
	 * Interviewee
	 *
	 * A person, family or organization responsible for creating or contributing to a resource by responding to an interviewer, usually a reporter, pollster, or some other information gathering agent
	 */
	const INTERVIEWEE = 'ive';

	/**
	 * Interviewer
	 *
	 * A person, family, or organization responsible for creating or contributing to a resource by acting as an interviewer, reporter, pollster, or some other information gathering agent
	 */
	const INTERVIEWER = 'ivr';

	/**
	 * Inventor
	 *
	 * A person, family, or organization responsible for creating a new device or process
	 */
	const INVENTOR = 'inv';

	/**
	 * Issuing body
	 *
	 * A person, family or organization issuing a work, such as an official organ of the body
	 */
	const ISSUING_BODY = 'isb';

	/**
	 * Judge
	 *
	 * A person who hears and decides on legal matters in court.
	 */
	const JUDGE = 'jud';

	/**
	 * Jurisdiction governed
	 *
	 * A jurisdiction governed by a law, regulation, etc., that was enacted by another jurisdiction
	 */
	const JURISDICTION_GOVERNED = 'jug';

	/**
	 * Laboratory
	 *
	 * An organization that provides scientific analyses of material samples
	 */
	const LABORATORY = 'lbr';

	/**
	 * Laboratory director
	 *
	 * A person or organization that manages or supervises work done in a controlled setting or environment
	 */
	const LABORATORY_DIRECTOR = 'ldr';

	/**
	 * Landscape architect
	 *
	 * An architect responsible for creating landscape works. This work involves coordinating the arrangement of existing and proposed land features and structures
	 */
	const LANDSCAPE_ARCHITECT = 'lsa';

	/**
	 * Lead
	 *
	 * A person or organization that takes primary responsibility for a particular activity or endeavor. May be combined with another relator term or code to show the greater importance this person or organization has regarding that particular role. If more than one relator is assigned to a heading, use the Lead relator only if it applies to all the relators
	 */
	const LEAD = 'led';

	/**
	 * Lender
	 *
	 * A person or organization permitting the temporary use of a book, manuscript, etc., such as for photocopying or microfilming
	 */
	const LENDER = 'len';

	/**
	 * Libelant
	 *
	 * A person or organization who files a libel in an ecclesiastical or admiralty case
	 */
	const LIBELANT = 'lil';

	/**
	 * Libelant-appellant
	 *
	 * A libelant who takes an appeal from one ecclesiastical court or admiralty to another to reverse the judgment
	 */
	const LIBELANT_APPELLANT = 'lit';

	/**
	 * Libelant-appellee
	 *
	 * A libelant against whom an appeal is taken from one ecclesiastical court or admiralty to another to reverse the judgment
	 */
	const LIBELANT_APPELLEE = 'lie';

	/**
	 * Libelee
	 *
	 * A person or organization against whom a libel has been filed in an ecclesiastical court or admiralty
	 */
	const LIBELEE = 'lel';

	/**
	 * Libelee-appellant
	 *
	 * A libelee who takes an appeal from one ecclesiastical court or admiralty to another to reverse the judgment
	 */
	const LIBELEE_APPELLANT = 'let';

	/**
	 * Libelee-appellee
	 *
	 * A libelee against whom an appeal is taken from one ecclesiastical court or admiralty to another to reverse the judgment
	 */
	const LIBELEE_APPELLEE = 'lee';

	/**
	 * Librettist
	 *
	 * An author of a libretto of an opera or other stage work, or an oratorio
	 */
	const LIBRETTIST = 'lbt';

	/**
	 * Licensee
	 *
	 * A person or organization who is an original recipient of the right to print or publish
	 */
	const LICENSEE = 'lse';

	/**
	 * Licensor
	 *
	 * A person or organization who is a signer of the license, imprimatur, etc
	 */
	const LICENSOR = 'lso';

	/**
	 * Lighting designer
	 *
	 * A person or organization who designs the lighting scheme for a theatrical presentation, entertainment, motion picture, etc.
	 */
	const LIGHTING_DESIGNER = 'lgd';

	/**
	 * Lithographer
	 *
	 * A person or organization who prepares the stone or plate for lithographic printing, including a graphic artist creating a design directly on the surface from which printing will be done.
	 */
	const LITHOGRAPHER = 'ltg';

	/**
	 * Lyricist
	 *
	 * An author of the words of a non-dramatic musical work (e.g. the text of a song), except for oratorios
	 */
	const LYRICIST = 'lyr';

	/**
	 * Manufacture place
	 *
	 * The place of manufacture (e.g., printing, duplicating, casting, etc.) of a resource in a published form
	 */
	const MANUFACTURE_PLACE = 'mfp';

	/**
	 * Manufacturer
	 *
	 * A person or organization responsible for printing, duplicating, casting, etc. a resource
	 */
	const MANUFACTURER = 'mfr';

	/**
	 * Marbler
	 *
	 * The entity responsible for marbling paper, cloth, leather, etc. used in construction of a resource
	 */
	const MARBLER = 'mrb';

	/**
	 * Markup editor
	 *
	 * A person or organization performing the coding of SGML, HTML, or XML markup of metadata, text, etc.
	 */
	const MARKUP_EDITOR = 'mrk';

	/**
	 * Medium
	 *
	 * A person held to be a channel of communication between the earthly world and a world
	 */
	const MEDIUM = 'med';

	/**
	 * Metadata contact
	 *
	 * A person or organization primarily responsible for compiling and maintaining the original description of a metadata set (e.g., geospatial metadata set)
	 */
	const METADATA_CONTACT = 'mdc';

	/**
	 * Metal-engraver
	 *
	 * An engraver responsible for decorations, illustrations, letters, etc. cut on a metal surface for printing or decoration
	 */
	const METAL_ENGRAVER = 'mte';

	/**
	 * Minute taker
	 *
	 * A person, family, or organization responsible for recording the minutes of a meeting
	 */
	const MINUTE_TAKER = 'mtk';

	/**
	 * Moderator
	 *
	 * A performer contributing to a resource by leading a program (often broadcast) where topics are discussed, usually with participation of experts in fields related to the discussion
	 */
	const MODERATOR = 'mod';

	/**
	 * Monitor
	 *
	 * A person or organization that supervises compliance with the contract and is responsible for the report and controls its distribution. Sometimes referred to as the grantee, or controlling agency
	 */
	const MONITOR = 'mon';

	/**
	 * Music copyist
	 *
	 * A person who transcribes or copies musical notation
	 */
	const MUSIC_COPYIST = 'mcp';

	/**
	 * Musical director
	 *
	 * A person who coordinates the activities of the composer, the sound editor, and sound mixers for a moving image production or for a musical or dramatic presentation or entertainment
	 */
	const MUSICAL_DIRECTOR = 'msd';

	/**
	 * Musician
	 *
	 * A person or organization who performs music or contributes to the musical content of a work when it is not possible or desirable to identify the function more precisely
	 */
	const MUSICIAN = 'mus';

	/**
	 * Narrator
	 *
	 * A performer contributing to a resource by reading or speaking in order to give an account of an act, occurrence, course of events, etc
	 */
	const NARRATOR = 'nrt';

	/**
	 * Onscreen presenter
	 *
	 * A performer contributing to an expression of a work by appearing on screen in nonfiction moving image materials or introductions to fiction moving image materials to provide contextual or background information. Use when another term (e.g., narrator, host) is either not applicable or not desired
	 */
	const ONSCREEN_PRESENTER = 'osp';

	/**
	 * Opponent
	 *
	 * A person or organization responsible for opposing a thesis or dissertation
	 */
	const OPPONENT = 'opn';

	/**
	 * Organizer
	 *
	 * A person, family, or organization organizing the exhibit, event, conference, etc., which gave rise to a resource
	 */
	const ORGANIZER = 'orm';

	/**
	 * Originator
	 *
	 * A person or organization performing the work, i.e., the name of a person or organization associated with the intellectual content of the work. This category does not include the publisher or personal affiliation, or sponsor except where it is also the corporate author
	 */
	const ORIGINATOR = 'org';

	/**
	 * Other
	 *
	 * A role that has no equivalent in the MARC list.
	 */
	const OTHER = 'oth';

	/**
	 * Owner
	 *
	 * A person, family, or organization that currently owns an item or collection, i.e.has legal possession of a resource
	 */
	const OWNER = 'own';

	/**
	 * Panelist
	 *
	 * A performer contributing to a resource by participating in a program (often broadcast) where topics are discussed, usually with participation of experts in fields related to the discussion
	 */
	const PANELIST = 'pan';

	/**
	 * Papermaker
	 *
	 * A person or organization responsible for the production of paper, usually from wood, cloth, or other fibrous material
	 */
	const PAPERMAKER = 'ppm';

	/**
	 * Patent applicant
	 *
	 * A person or organization that applied for a patent
	 */
	const PATENT_APPLICANT = 'pta';

	/**
	 * Patent holder
	 *
	 * A person or organization that was granted the patent referred to by the item
	 */
	const PATENT_HOLDER = 'pth';

	/**
	 * Patron
	 *
	 * A person or organization responsible for commissioning a work. Usually a patron uses his or her means or influence to support the work of artists, writers, etc. This includes those who commission and pay for individual works
	 */
	const PATRON = 'pat';

	/**
	 * Performer
	 *
	 * A person contributing to a resource by performing music, acting, dancing, speaking, etc., often in a musical or dramatic presentation, etc.&nbsp;If specific codes are used, [prf] is used for a person whose principal skill is not known or specified
	 */
	const PERFORMER = 'prf';

	/**
	 * Permitting agency
	 *
	 * An organization (usually a government agency) that issues permits under which work is accomplished
	 */
	const PERMITTING_AGENCY = 'pma';

	/**
	 * Photographer
	 *
	 * A person, family, or organization responsible for creating a photographic work
	 */
	const PHOTOGRAPHER = 'pht';

	/**
	 * Plaintiff
	 *
	 * A person or organization who brings a suit in a civil proceeding
	 */
	const PLAINTIFF = 'ptf';

	/**
	 * Plaintiff-appellant
	 *
	 * A plaintiff who takes an appeal from one court or jurisdiction to another to reverse the judgment, usually in a legal proceeding
	 */
	const PLAINTIFF_APPELLANT = 'ptt';

	/**
	 * Plaintiff-appellee
	 *
	 * A plaintiff against whom an appeal is taken from one court or jurisdiction to another to reverse the judgment, usually in a legal proceeding
	 */
	const PLAINTIFF_APPELLEE = 'pte';

	/**
	 * Platemaker
	 *
	 * A person, family, or organization involved in manufacturing a manifestation by preparing plates used in the production of printed images and/or text
	 */
	const PLATEMAKER = 'plt';

	/**
	 * Praeses
	 *
	 * A person who is the faculty moderator of an academic disputation, normally proposing a thesis and participating in the ensuing disputation
	 */
	const PRAESES = 'pra';

	/**
	 * Presenter
	 *
	 * A person or organization mentioned in an “X presents” credit for moving image materials and who is associated with production, finance, or distribution in some way.  A vanity credit;  in early years, normally the head of a studio
	 */
	const PRESENTER = 'pre';

	/**
	 * Printer
	 *
	 * A person, family, or organization involved in manufacturing a manifestation of printed text, notated music, etc., from type or plates, such as a book, newspaper, magazine, broadside, score, etc
	 */
	const PRINTER = 'prt';

	/**
	 * Printer of plates
	 *
	 * A person or organization who prints illustrations from plates.
	 */
	const PRINTER_OF_PLATES = 'pop';

	/**
	 * Printmaker
	 *
	 * A person or organization who makes a relief, intaglio, or planographic printing surface
	 */
	const PRINTMAKER = 'prm';

	/**
	 * Process contact
	 *
	 * A person or organization primarily responsible for performing or initiating a process, such as is done with the collection of metadata sets
	 */
	const PROCESS_CONTACT = 'prc';

	/**
	 * Producer
	 *
	 * A person, family, or organization responsible for most of the business aspects of a production for screen, audio recording, television, webcast, etc. The producer is generally responsible for fund raising, managing the production, hiring key personnel, arranging for distributors, etc.
	 */
	const PRODUCER = 'pro';

	/**
	 * Production company
	 *
	 * An organization that is responsible for financial, technical, and organizational management of a production for stage, screen, audio recording, television, webcast, etc.
	 */
	const PRODUCTION_COMPANY = 'prn';

	/**
	 * Production designer
	 *
	 * A person or organization responsible for designing the overall visual appearance of a moving image production
	 */
	const PRODUCTION_DESIGNER = 'prs';

	/**
	 * Production manager
	 *
	 * A person responsible for all technical and business matters in a production
	 */
	const PRODUCTION_MANAGER = 'pmn';

	/**
	 * Production personnel
	 *
	 * A person or organization associated with the production (props, lighting, special effects, etc.) of a musical or dramatic presentation or entertainment
	 */
	const PRODUCTION_PERSONNEL = 'prd';

	/**
	 * Production place
	 *
	 * The place of production (e.g., inscription, fabrication, construction, etc.) of a resource in an unpublished form
	 */
	const PRODUCTION_PLACE = 'prp';

	/**
	 * Programmer
	 *
	 * A person, family, or organization responsible for creating a computer program
	 */
	const PROGRAMMER = 'prg';

	/**
	 * Project director
	 *
	 * A person or organization with primary responsibility for all essential aspects of a project, has overall responsibility for managing projects, or provides overall direction to a project manager
	 */
	const PROJECT_DIRECTOR = 'pdr';

	/**
	 * Proofreader
	 *
	 * A person who corrects printed matter. For manuscripts, use Corrector [crr]
	 */
	const PROOFREADER = 'pfr';

	/**
	 * Provider
	 *
	 * A person or organization who produces, publishes, manufactures, or distributes a resource if specific codes are not desired (e.g. [mfr], [pbl])
	 */
	const PROVIDER = 'prv';

	/**
	 * Publication place
	 *
	 * The place where a resource is published
	 */
	const PUBLICATION_PLACE = 'pup';

	/**
	 * Publisher
	 *
	 * A person or organization responsible for publishing, releasing, or issuing a resource
	 */
	const PUBLISHER = 'pbl';

	/**
	 * Publishing director
	 *
	 * A person or organization who presides over the elaboration of a collective work to ensure its coherence or continuity. This includes editors-in-chief, literary editors, editors of series, etc.
	 */
	const PUBLISHING_DIRECTOR = 'pbd';

	/**
	 * Puppeteer
	 *
	 * A performer contributing to a resource by manipulating, controlling, or directing puppets or marionettes in a moving image production or a musical or dramatic presentation or entertainment
	 */
	const PUPPETEER = 'ppt';

	/**
	 * Radio director
	 *
	 * A director responsible for the general management and supervision of a radio program
	 */
	const RADIO_DIRECTOR = 'rdd';

	/**
	 * Radio producer
	 *
	 * A producer responsible for most of the business aspects of a radio program
	 */
	const RADIO_PRODUCER = 'rpc';

	/**
	 * Recording engineer
	 *
	 * A person contributing to a resource by supervising the technical aspects of a sound or video recording session
	 */
	const RECORDING_ENGINEER = 'rce';

	/**
	 * Recordist
	 *
	 * A person or organization who uses a recording device to capture sounds and/or video during a recording session, including field recordings of natural sounds, folkloric events, music, etc.
	 */
	const RECORDIST = 'rcd';

	/**
	 * Redaktor
	 *
	 * A person or organization who writes or develops the framework for an item without being intellectually responsible for its content
	 */
	const REDAKTOR = 'red';

	/**
	 * Renderer
	 *
	 * A person or organization who prepares drawings of architectural designs (i.e., renderings) in accurate, representational perspective to show what the project will look like when completed
	 */
	const RENDERER = 'ren';

	/**
	 * Reporter
	 *
	 * A person or organization who writes or presents reports of news or current events on air or in print
	 */
	const REPORTER = 'rpt';

	/**
	 * Repository
	 *
	 * An organization that hosts data or material culture objects and provides services to promote long term, consistent and shared use of those data or objects
	 */
	const REPOSITORY = 'rps';

	/**
	 * Research team head
	 *
	 * A person who directed or managed a research project
	 */
	const RESEARCH_TEAM_HEAD = 'rth';

	/**
	 * Research team member
	 *
	 * A person who participated in a research project but whose role did not involve direction or management of it
	 */
	const RESEARCH_TEAM_MEMBER = 'rtm';

	/**
	 * Researcher
	 *
	 * A person or organization responsible for performing research
	 */
	const RESEARCHER = 'res';

	/**
	 * Respondent
	 *
	 * A person or organization who makes an answer to the courts pursuant to an application for redress (usually in an equity proceeding) or a candidate for a degree who defends or opposes a thesis provided by the praeses in an academic disputation
	 */
	const RESPONDENT = 'rsp';

	/**
	 * Respondent-appellant
	 *
	 * A respondent who takes an appeal from one court or jurisdiction to another to reverse the judgment, usually in an equity proceeding
	 */
	const RESPONDENT_APPELLANT = 'rst';

	/**
	 * Respondent-appellee
	 *
	 * A respondent against whom an appeal is taken from one court or jurisdiction to another to reverse the judgment, usually in an equity proceeding
	 */
	const RESPONDENT_APPELLEE = 'rse';

	/**
	 * Responsible party
	 *
	 * A person or organization legally responsible for the content of the published material
	 */
	const RESPONSIBLE_PARTY = 'rpy';

	/**
	 * Restager
	 *
	 * A person or organization, other than the original choreographer or director, responsible for restaging a choreographic or dramatic work and who contributes minimal new content
	 */
	const RESTAGER = 'rsg';

	/**
	 * Restorationist
	 *
	 * A person, family, or organization responsible for the set of technical, editorial, and intellectual procedures aimed at compensating for the degradation of an item by bringing it back to a state as close as possible to its original condition
	 */
	const RESTORATIONIST = 'rsr';

	/**
	 * Reviewer
	 *
	 * A person or organization responsible for the review of a book, motion picture, performance, etc.
	 */
	const REVIEWER = 'rev';

	/**
	 * Rubricator
	 *
	 * A person or organization responsible for parts of a work, often headings or opening parts of a manuscript, that appear in a distinctive color, usually red
	 */
	const RUBRICATOR = 'rbr';

	/**
	 * Scenarist
	 *
	 * A person or organization who is the author of a motion picture screenplay, generally the person who wrote the scenarios for a motion picture during the silent era
	 */
	const SCENARIST = 'sce';

	/**
	 * Scientific advisor
	 *
	 * A person or organization who brings scientific, pedagogical, or historical competence to the conception and realization on a work, particularly in the case of audio-visual items
	 */
	const SCIENTIFIC_ADVISOR = 'sad';

	/**
	 * Screenwriter
	 *
	 * An author of a screenplay, script, or scene
	 */
	const SCREENWRITER = 'aus';

	/**
	 * Scribe
	 *
	 * A person who is an amanuensis and for a writer of manuscripts proper. For a person who makes pen-facsimiles, use Facsimilist [fac]
	 */
	const SCRIBE = 'scr';

	/**
	 * Sculptor
	 *
	 * An artist responsible for creating a three-dimensional work by modeling, carving, or similar technique
	 */
	const SCULPTOR = 'scl';

	/**
	 * Second party
	 *
	 * A person or organization who is identified as the party of the second part. In the case of transfer of right, this is the assignee, transferee, licensee, grantee, etc. Multiple parties can be named jointly as the second party
	 */
	const SECOND_PARTY = 'spy';

	/**
	 * Secretary
	 *
	 * A person or organization who is a recorder, redactor, or other person responsible for expressing the views of a organization
	 */
	const SECRETARY = 'sec';

	/**
	 * Seller
	 *
	 * A former owner of an item who sold that item to another owner
	 */
	const SELLER = 'sll';

	/**
	 * Set designer
	 *
	 * A person who translates the rough sketches of the art director into actual architectural structures for a theatrical presentation, entertainment, motion picture, etc. Set designers draw the detailed guides and specifications for building the set
	 */
	const SET_DESIGNER = 'std';

	/**
	 * Setting
	 *
	 * An entity in which the activity or plot of a work takes place, e.g. a geographic place, a time period, a building, an event
	 */
	const SETTING = 'stg';

	/**
	 * Signer
	 *
	 * A person whose signature appears without a presentation or other statement indicative of provenance. When there is a presentation statement, use Inscriber [ins].
	 */
	const SIGNER = 'sgn';

	/**
	 * Singer
	 *
	 * A performer contributing to a resource by using his/her/their voice, with or without instrumental accompaniment, to produce music. A singer's performance may or may not include actual words
	 */
	const SINGER = 'sng';

	/**
	 * Sound designer
	 *
	 * A person who produces and reproduces the sound score (both live and recorded), the installation of microphones, the setting of sound levels, and the coordination of sources of sound for a production
	 */
	const SOUND_DESIGNER = 'sds';

	/**
	 * Speaker
	 *
	 * A performer contributing to a resource by speaking words, such as a lecture, speech, etc.&nbsp;
	 */
	const SPEAKER = 'spk';

	/**
	 * Sponsor
	 *
	 * A person, family, or organization sponsoring some aspect of a resource, e.g., funding research, sponsoring an event
	 */
	const SPONSOR = 'spn';

	/**
	 * Stage director
	 *
	 * A person or organization contributing to a stage resource through the overall management and supervision of a performance
	 */
	const STAGE_DIRECTOR = 'sgd';

	/**
	 * Stage manager
	 *
	 * A person who is in charge of everything that occurs on a performance stage, and who acts as chief of all crews and assistant to a director during rehearsals
	 */
	const STAGE_MANAGER = 'stm';

	/**
	 * Standards body
	 *
	 * An organization responsible for the development or enforcement of a standard
	 */
	const STANDARDS_BODY = 'stn';

	/**
	 * Stereotyper
	 *
	 * A person or organization who creates a new plate for printing by molding or copying another printing surface
	 */
	const STEREOTYPER = 'str';

	/**
	 * Storyteller
	 *
	 * A performer contributing to a resource by relaying a creator's original story with dramatic or theatrical interpretation
	 */
	const STORYTELLER = 'stl';

	/**
	 * Supporting host
	 *
	 * A person or organization that supports (by allocating facilities, staff, or other resources) a project, program, meeting, event, data objects, material culture objects, or other entities capable of support
	 */
	const SUPPORTING_HOST = 'sht';

	/**
	 * Surveyor
	 *
	 * A person, family, or organization contributing to a cartographic resource by providing measurements or dimensional relationships for the geographic area represented
	 */
	const SURVEYOR = 'srv';

	/**
	 * Teacher
	 *
	 * A performer contributing to a resource by giving instruction or providing a demonstration
	 */
	const TEACHER = 'tch';

	/**
	 * Technical director
	 *
	 * A person who is ultimately in charge of scenery, props, lights and sound for a production
	 */
	const TECHNICAL_DIRECTOR = 'tcd';

	/**
	 * Television director
	 *
	 * A director responsible for the general management and supervision of a television program
	 */
	const TELEVISION_DIRECTOR = 'tld';

	/**
	 * Television producer
	 *
	 * A producer responsible for most of the business aspects of a television program
	 */
	const TELEVISION_PRODUCER = 'tlp';

	/**
	 * Thesis advisor
	 *
	 * A person under whose supervision a degree candidate develops and presents a thesis, mémoire, or text of a dissertation
	 */
	const THESIS_ADVISOR = 'ths';

	/**
	 * Transcriber
	 *
	 * A person, family, or organization contributing to a resource by changing it from one system of notation to another. For a work transcribed for a different instrument or performing group, see Arranger [arr]. For makers of pen-facsimiles, use Facsimilist [fac]
	 */
	const TRANSCRIBER = 'trc';

	/**
	 * Translator
	 *
	 * A person or organization who renders a text from one language into another, or from an older form of a language into the modern form
	 */
	const TRANSLATOR = 'trl';

	/**
	 * Type designer
	 *
	 * A person or organization who designs the type face used in a particular item
	 */
	const TYPE_DESIGNER = 'tyd';

	/**
	 * Typographer
	 *
	 * A person or organization primarily responsible for choice and arrangement of type used in an item. If the typographer is also responsible for other aspects of the graphic design of a book (e.g., Book designer [bkd]), codes for both functions may be needed
	 */
	const TYPOGRAPHER = 'tyg';

	/**
	 * University place
	 *
	 * A place where a university that is associated with a resource is located, for example, a university where an academic dissertation or thesis was presented
	 */
	const UNIVERSITY_PLACE = 'uvp';

	/**
	 * Videographer
	 *
	 * A person in charge of a video production, e.g. the video recording of a stage production as opposed to a commercial motion picture. The videographer may be the camera operator or may supervise one or more camera operators. Do not confuse with cinematographer
	 */
	const VIDEOGRAPHER = 'vdg';

	/**
	 * Voice actor
	 *
	 * An actor contributing to a resource by providing the voice for characters in radio and audio productions and for animated characters in moving image works, as well as by providing voice overs in radio and television commercials, dubbed resources, etc.
	 */
	const VOICE_ACTOR = 'vac';

	/**
	 * Witness
	 *
	 * Use for a person who verifies the truthfulness of an event or action.
	 */
	const WITNESS = 'wit';

	/**
	 * Wood engraver
	 *
	 * A person or organization who makes prints by cutting the image in relief on the end-grain of a wood block
	 */
	const WOOD_ENGRAVER = 'wde';

	/**
	 * Woodcutter
	 *
	 * A person or organization who makes prints by cutting the image in relief on the plank side of a wood block
	 */
	const WOODCUTTER = 'wdc';

	/**
	 * Writer of accompanying material
	 *
	 * A person or organization who writes significant material which accompanies a sound recording or other audiovisual material
	 */
	const WRITER_OF_ACCOMPANYING_MATERIAL = 'wam';

	/**
	 * Writer of added commentary
	 *
	 * A person, family, or organization contributing to an expression of a work by providing an interpretation or critical explanation of the original work
	 */
	const WRITER_OF_ADDED_COMMENTARY = 'wac';

	/**
	 * Writer of added lyrics
	 *
	 * A writer of words added to an expression of a musical work. For lyric writing in collaboration with a composer to form an original work, see lyricist
	 */
	const WRITER_OF_ADDED_LYRICS = 'wal';

	/**
	 * Writer of added text
	 *
	 * A person, family, or organization contributing to a non-textual resource by providing text for the non-textual work (e.g., writing captions for photographs, descriptions of maps).
	 */
	const WRITER_OF_ADDED_TEXT = 'wat';

	/**
	 * Writer of introduction
	 *
	 * A person, family, or organization contributing to a resource by providing an introduction to the original work
	 */
	const WRITER_OF_INTRODUCTION = 'win';

	/**
	 * Writer of preface
	 *
	 * A person, family, or organization contributing to a resource by providing a preface to the original work
	 */
	const WRITER_OF_PREFACE = 'wpr';

	/**
	 * Writer of supplementary textual content
	 *
	 * A person, family, or organization contributing to a resource by providing supplementary textual content (e.g., an introduction, a preface) to the original work
	 */
	const WRITER_OF_SUPPLEMENTARY_TEXTUAL_CONTENT = 'wst';


}
