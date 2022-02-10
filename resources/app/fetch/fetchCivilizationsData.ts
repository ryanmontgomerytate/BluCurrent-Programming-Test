import { Civilization } from '../types/civilizations'

export const fetchCivilizationsData = async (): Promise<Civilization[]> => {
  const apiUrl = '/api/civilizations'
  let civilizations: Civilization[] = []

  try {
    const response = await fetch(apiUrl)
    const json = await response.json()
    civilizations = (json as any).map((civ) =>
      Object.assign(new Civilization(), civ),
    )
  } catch (error) {
    console.log('error', error)
  }

  return civilizations
}
// make function to delete civ data
// contact PHP endpoint on backend
// function takes an ID as an argument
export const deleteCivilizationsData = async (id: string) => {
  const apiUrl = `/api/civilizations/${id}`

  try {
    await fetch(apiUrl, { method: 'DELETE' })
  } catch (error) {
    console.log('error', error)
  }
}

// make function to update civ data
// contact PHP endpoint on backend
// function take one Civilization object as an argument
export const updateCivilizationsData = async (civilization: Civilization) => {
  const apiUrl = `/api/civilizations/${civilization.id}`
  console.log({civilization})
  try {
    await fetch(apiUrl, { method: 'PUT', body: JSON.stringify(civilization) })
  } catch (error) {
    console.log('error', error)
  }
}
