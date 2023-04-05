<?php

namespace Hametuha\HamePub\Definitions;

/**
 * Onix Code list 5
 *
 * @see http://www.stison.com/onix/codelists/onix-codelist-5.htm
 * @package Hametuha\HamePub\Definitions
 */
class Onix extends Prototype
{
    protected static $schema = 'onix:codelist5';

    /**
     * Proprietary
     *
     * For example, a publisher’s or wholesaler’s product number.
     */
    public const PROPRIETARY = 1;

    /**
     * ISBN-10
     *
     * International Standard Book Number, pre-2007, unhyphenated (10 characters) – now DEPRECATED in ONIX for Books, except where
     * providing historical information for compatibility with legacy systems. It should only be used in relation to products published
     * before 2007 – when ISBN-13 superseded it – and should never be used as the ONLY identifier (it should always be accompanied
     * by the correct GTIN-13 / ISBN-13).
     */
    public const ISBN_10 = 2;

    /**
     * GTIN-13
     *
     * GS1 Global Trade Item Number, formerly known as EAN article number (13 digits).
     */
    public const GTIN_13 = 3;

    /**
     * UPC
     *
     * UPC product number (12 digits).
     */
    public const UPC = 4;

    /**
     * ISMN-10
     *
     * International Standard Music Number (M plus nine digits). Pre-2008 – now DEPRECATED in ONIX for Books, except where providing
     * historical information for compatibility with legacy systems. It should only be used in relation to products published before
     * 2008 – when ISMN-13 superseded it – and should never be used as the ONLY identifier (it should always be accompanied by the
     * correct ISMN-13).
     */
    public const ISMN_10 = 5;

    /**
     * DOI
     *
     * Digital Object Identifier (variable length and character set).
     */
    public const DOI = 6;

    /**
     * LCCN
     *
     * Library of Congress Control Number (12 characters, alphanumeric).
     */
    public const LCCN = 13;

    /**
     * GTIN-14
     *
     * GS1 Global Trade Item Number (14 digits).
     */
    public const GTIN_14 = 14;

    /**
     * ISBN-13
     *
     * International Standard Book Number, from 2007, unhyphenated (13 digits starting 978 or 9791–9799).
     */
    public const ISBN_13 = 15;

    /**
     * Legal deposit number
     *
     * The number assigned to a publication as part of a national legal deposit process.
     */
    public const LEGAL_DEPOSIT_NUMBER = 17;

    /**
     * URN
     *
     * Uniform Resource Name: note that in trade applications an ISBN must be sent as a GTIN-13 and, where required, as an ISBN-13
     * – it should not be sent as a URN.
     */
    public const URN = 22;

    /**
     * OCLC number
     *
     * A unique number assigned to a bibliographic item by OCLC.
     */
    public const OCLC_NUMBER = 23;

    /**
     * Co-publisher's ISBN-13
     *
     * An ISBN-13 assigned by a co-publisher. The ‘main’ ISBN sent with ID type code 03 and/or 15 should always be the ISBN that
     * is used for ordering from the supplier identified in Supply Detail. However, ISBN rules allow a co-published title to carry
     * more than one ISBN. The co-publisher should be identified in an instance of the <Publisher> composite, with the applicable
     * <PublishingRole> code.
     */
    public const CO_PUBLISHERS_ISBN_13 = 24;

    /**
     * ISMN-13
     *
     * International Standard Music Number, from 2008 (13-digit number starting 9790).
     */
    public const ISMN_13 = 25;

    /**
     * ISBN-A
     *
     * Actionable ISBN, in fact a special DOI incorporating the ISBN-13 within the DOI syntax. Begins ‘10.978.’ or ‘10.979.’ and
     * includes a / character between the registrant element (publisher prefix) and publication element of the ISBN, eg 10.978.000/1234567.
     * Note the ISBN-A should always be accompanied by the ISBN itself, using codes 03 and/or 15.
     */
    public const ISBN_A = 26;

    /**
     * JP e-code
     *
     * E-publication identifier controlled by JPOIID’s Committee for Research and Management of Electronic Publishing Codes.
     */
    public const JP_E_CODE = 27;

    /**
     * OLCC number
     *
     * Unique number assigned by the Chinese Online Library Cataloging Center (see http://olcc.nlc.gov.cn).
     */
    public const OLCC_NUMBER = 28;

    /**
     * JP Magazine ID
     *
     * Japanese magazine identifier, similar in scope to ISSN but identifying a specific issue of a serial publication. Five digits
     * to identify the periodical, plus a hyphen and two digits to identify the issue.
     */
    public const JP_MAGAZINE_ID = 29;
}
