
/* SQL queries for final project.   Vanessa Job and Xiaomeng Li  */ 
/* We need 30 queries total.  */  

/* 
JOINS - At least 1 query for each table should use a join of
some sort linking at least 2 tables together */ 

/* JOIN for adjectives.  Find out which adjectives are represented in the nouns tables as nouns.  */ 

select a.base_adjective as `Adjectives Appearing as Nouns in  Noun Table` from adjtable as a join nountable as n on a.base_adjective =  n.base_noun; 

/* JOIN for adverbs.  */ 
select a.adverb, v.base_verb from advtable as a join verbtable as v on a.associated_verb = v.base_verb;

/* JOIN for conjunctions.   Join with words tables?   */ 
/* FIX SPELLING? */ 
select c.conjuction from word_copy as w join conjuctiontable as c on c.conjuction = w.conjunction;

/* JOIN for contractions. Find the verbs associated with each contraction that has an associated verb.   */ 
select c.contraction ,v.base_verb from contractiontable as c join verbtable as v on c.associated_base_verb = v.base_verb;

/* JOIN for homophones.   Join homophones to nouns to see which homophones are in the noun table. */ 
select n.base_noun as `Nouns with Homophones` from nountable as n join homophonetable as h on (h.homophone_1 = n.base_noun or h.homophone_2 = n.base_noun or h.homophone_3 = n.base_noun or homophone_4 = n.base_noun);

/* JOIN for nouns.  Find out which nouns have representation in the contraction table. */ 
select n.base_noun as `Nouns with Contractions` from nountable as n join contractiontable as c where n.base_noun = c.associated_noun group by n.base_noun; 

/* JOIN for prepositions.  Find out how many preppositions are the second word of a song
   title. */ 

select s.word2 from song_copy as s join prepositiontable as p where s.word2 = p.preposition;

/* JOIN for songs. */
/* See which contractions appear as the first word of a song.  */ 
select c.contraction from contractiontable as c join song_copy as s on s.word1 = c.contraction; 

/* JOIN FOR verbs.  Find all the verbs for which there is an adjective with that verb related.  */ 
select  v.base_verb as `Verbs from Adjectives Table` from verbtable as v join adjtable as a on a.associated_verb = v.base_verb; 

/* JOIN for words. Find out which base verbs have been used in songs so far.  */
select v.base_verb from word_copy as w join verbtable as v where w.verb = v.base_verb group by v.base_verb;


/* JOIN for usertable. Find all songs that user one has added. */
select s.player_name from usertable_copy as u join song_copy as s on u.id = u.id where u.id = 1;


/* GROUP BY QUERY 1: Find out how many words appear more than once as the first word in a song.  */
select word1, count(word1) from song_copy group by word1 having count(word1) > 1 and word1 not is NULL;

/* GROUP BY QUERY 2:  */ 
select length(adverb), count(length(adverb)) from advtable as a group by length(adverb);

/* ORDER BY */  
select length(advtable as `Adverb length`, count(length(advtable)) as `How many` from advtable group by length(adverb) order by count(length(adverb));

/* LIMIT query 1: Print the first 5 conjunctions. */ 
select conjuction from conjuctiontable LIMIT 5;

/* LIMIT query 2. */ 
/* Print the first 15 users from the user table. */
select * from usertable_copy limit 15; 

/* AVG: Find the average length of a verb in the verbs table.  5.4877*/
select avg(length(base_verb)) from verbtable; 

/* COUNT: Find out how many length 5 verbs appear in the verbs table.  */
select count(length(base_verb)) as `How many length 5 verbs?` from verbtable where length(base_verb) = 5;

/* MIN: Find the minimun length of a adjective in the adjective table.  */
select min(length(base_adjective)) from adjtable; 

/* MAX: Find the maxium length of an adverb in the adverb table.  */
select max(length(adverb)) from advtable; 

/* SUM: Find the sum of the lengths of the words in the homophone table. */ 
/* This one is pretty contrived.  Can we replace it? */ 
select sum(length(homophone_1)) + sum(length(homophone_2)) + sum(length(homophone_3)) + sum(length(homophone_4)) from homophonetable;

/* Find number of distinct users in the usertable. */ 
select count(distinct Account) as `Distinct Users` from usertable_copy; 

/* Find how many homophones there are in the homophone table.  */ 
select count(homophone_1) +  count(homophone_2) + count(homophone_3) + count(homophone_4) as `Total Number of Homophones` from homophonetable; 

/* Find all the conjunctions that contain the letter 'o'. */ 
select conjuction from conjuctiontable where conjuction like '%o%';

/* Find the number of distinct nouns in the word table.  */ 
select count(distinct noun) as `Number of Different Nouns` from word_copy; 

/* Make sure there are no duplicate prepositions in preposition table. */ 
/* This should return nothing.  */ 

select preposition, count(preposition) from prepositiontable group by preposition having count(preposition) > 1;

/* Figure out if there are any gerunds in the noun table. If there are, they really don't 
   need to be there, though it doesn't hurt anything.  */ 

select v.gerund from verbtable as v join nountable as n on v.gerund = n.base_noun;

/* Find all the verbs in the verb table where the past form and past participle are different. */
select base_verb from verbtable as v where v.past != v.past_participle; 

/* Find all the verbs that begin contain the letter 'j'.  */ 
select base_verb from verbtable where base_verb like '%j%'; 

/* Are there any adverbs that are also base_verbs in the verb table? Nope, despite what some
   English speakers think. */ 
select v.base_verb from verbtable as v join advtable as a on v.base_verb = a.adverb;

/* For entertainment, create some aliterative adjective noun combos.  */ 

select concat(a.base_adjective,' ', n.base_noun) from adjtable as a join nountable as n where a.base_adjective like 'j%' and n.base_noun like 'j%';

/* Figure out how many of the adverbs end in -ly. */ 
select count(a.adverbs) from adverbs as a where a.adverb like '%ly';


/* Find out which homophones are base_verbs in the verb table. */ 

select v.base_verb as `Hnomophones that are verbs` from verbtable as v join homophonetable as h on (h.homophone_1 = v.base_verb or h.homophone_2 = v.base_verb or h.homophone_3 = v.base_verb or h.homophone_4 = v.base_verb);
